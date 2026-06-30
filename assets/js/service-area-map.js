(() => {
    const manhattanZipPrefix = '10';
    let zipAreaNames = {};

    async function getServiceAreaData() {
        if (window.MANHATTAN_APPLIANCE_SERVICE_AREA_DATA) {
            return window.MANHATTAN_APPLIANCE_SERVICE_AREA_DATA;
        }

        const response = await fetch('/assets/data/service-areas.json');
        if (!response.ok) {
            throw new Error(`Failed to load service area data (${response.status})`);
        }

        return response.json();
    }

    function isManhattanZip(zip) {
        return String(zip || '').startsWith(manhattanZipPrefix);
    }

    function getAreaName(zip) {
        if (zipAreaNames[zip]) {
            return zipAreaNames[zip];
        }

        return `ZIP ${zip}`;
    }

    function baseStyle(zip) {
        if (isManhattanZip(zip)) {
            return {
                color: '#4A96A2',
                weight: 1.25,
                fillColor: '#4A96A2',
                fillOpacity: 0.2
            };
        }

        return {
            color: '#1F3A44',
            weight: 1.15,
            fillColor: '#4A96A2',
            fillOpacity: 0.12
        };
    }

    function hoverStyle(zip) {
        if (isManhattanZip(zip)) {
            return {
                color: '#1F3A44',
                weight: 2.4,
                fillColor: '#FF7A59',
                fillOpacity: 0.4
            };
        }

        return {
            color: '#1F3A44',
            weight: 2.2,
            fillColor: '#FF7A59',
            fillOpacity: 0.28
        };
    }

    function updateZoomLabels(map, labeledLayers) {
        const showLabels = map.getZoom() >= 12.5;

        labeledLayers.forEach(({ layer, hasNamedRegion }) => {
            if (!hasNamedRegion) {
                layer.closeTooltip();
                return;
            }

            if (showLabels) {
                layer.openTooltip();
            } else {
                layer.closeTooltip();
            }
        });
    }

    async function initServiceAreaMap() {
        const mapNode = document.querySelector('[data-service-area-map]');

        if (!mapNode || typeof window.L === 'undefined' || mapNode.dataset.mapBound === 'true' || mapNode.dataset.mapBound === 'loading') {
            return;
        }

        mapNode.dataset.mapBound = 'loading';

        try {
            const serviceAreaData = await getServiceAreaData();
            const serviceZips = new Set(serviceAreaData.service_zips || []);
            zipAreaNames = serviceAreaData.zip_area_names || {};

            const map = window.L.map(mapNode, {
                scrollWheelZoom: true,
                zoomControl: true
            }).setView([40.7831, -73.9712], 11);

            map.scrollWheelZoom.enable();
            map.dragging.enable();
            map.doubleClickZoom.enable();
            map.touchZoom.enable();
            map.boxZoom.enable();
            map.keyboard.enable();

            window.L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
                maxZoom: 18,
                attribution: '&copy; OpenStreetMap contributors &copy; CARTO'
            }).addTo(map);

            const response = await fetch('/assets/data/service-zips.geojson');
            const geojson = await response.json();

            const manhattanFeatures = geojson.features.filter((feature) => {
                const zip = feature?.properties?.ZCTA5CE10;
                return serviceZips.has(zip) && isManhattanZip(zip);
            });

            const newJerseyFeatures = geojson.features.filter((feature) => {
                const zip = feature?.properties?.ZCTA5CE10;
                return serviceZips.has(zip) && !isManhattanZip(zip);
            });

            const labeledLayers = [];

            const makeLayer = (features) => window.L.geoJSON(
                { type: 'FeatureCollection', features },
                {
                    style(feature) {
                        return baseStyle(feature.properties.ZCTA5CE10);
                    },
                    onEachFeature(feature, layer) {
                        const zip = feature.properties.ZCTA5CE10;
                        const areaName = getAreaName(zip);
                        const hasNamedRegion = Boolean(zipAreaNames[zip]);
                        const label = `<strong>${areaName}</strong><br>ZIP ${zip}`;

                        layer.bindTooltip(label, {
                            sticky: !hasNamedRegion,
                            direction: 'top',
                            opacity: 0.96,
                            permanent: false,
                            className: 'service-area-map-label'
                        });

                        labeledLayers.push({ layer, hasNamedRegion });

                        layer.on('mouseover', () => {
                            layer.setStyle(hoverStyle(zip));
                            layer.bringToFront();
                            layer.openTooltip();
                        });

                        layer.on('mouseout', () => {
                            layer.setStyle(baseStyle(zip));
                            if (map.getZoom() < 12.5 || !hasNamedRegion) {
                                layer.closeTooltip();
                            }
                        });

                        layer.on('click', () => {
                            layer.setStyle(hoverStyle(zip));
                            layer.openTooltip();
                        });
                    }
                }
            );

            const manhattanLayer = makeLayer(manhattanFeatures).addTo(map);
            const newJerseyLayer = makeLayer(newJerseyFeatures).addTo(map);

            const manhattanBounds = manhattanLayer.getBounds();
            if (manhattanBounds.isValid()) {
                map.fitBounds(manhattanBounds.pad(0.08));
            }

            map.on('zoomend', () => updateZoomLabels(map, labeledLayers));
            updateZoomLabels(map, labeledLayers);

            mapNode.dataset.mapBound = 'true';
        } catch (error) {
            delete mapNode.dataset.mapBound;
            throw error;
        }
    }

    const boot = () => {
        initServiceAreaMap().catch((error) => console.error(error));
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }

    window.addEventListener('pageshow', boot);
})();
