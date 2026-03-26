(() => {
    const serviceZips = new Set(window.MANHATTAN_APPLIANCE_SERVICE_ZIPS || []);
    const manhattanZipPrefix = '10';
    const zipAreaNames = {
        '10010': 'Gramercy Park / Murray Hill',
        '10016': 'Gramercy Park / Murray Hill',
        '10017': 'Gramercy Park / Murray Hill',
        '10022': 'Gramercy Park / Murray Hill',
        '10012': 'Greenwich Village / SoHo',
        '10013': 'Greenwich Village / SoHo',
        '10014': 'Greenwich Village / SoHo',
        '10004': 'Lower Manhattan',
        '10005': 'Lower Manhattan',
        '10006': 'Lower Manhattan',
        '10007': 'Lower Manhattan',
        '10038': 'Lower Manhattan',
        '10280': 'Lower Manhattan',
        '10002': 'Lower East Side',
        '10003': 'Lower East Side / East Village',
        '10009': 'Lower East Side / East Village',
        '10021': 'Upper East Side',
        '10028': 'Upper East Side',
        '10044': 'Upper East Side / Roosevelt Island',
        '10065': 'Upper East Side',
        '10075': 'Upper East Side',
        '10128': 'Upper East Side',
        '10023': 'Upper West Side',
        '10024': 'Upper West Side',
        '10025': 'Upper West Side',
        '10001': 'Chelsea / Clinton',
        '10011': 'Chelsea / Clinton',
        '10018': 'Chelsea / Clinton',
        '10019': 'Chelsea / Clinton',
        '10020': 'Chelsea / Clinton',
        '10036': 'Chelsea / Clinton'
    };

    function isManhattanZip(zip) {
        return String(zip || '').startsWith(manhattanZipPrefix);
    }

    function getAreaName(zip) {
        if (zipAreaNames[zip]) {
            return zipAreaNames[zip];
        }

        return isManhattanZip(zip) ? 'Manhattan Service Area' : 'New Jersey Service Area';
    }

    function baseStyle(zip) {
        if (isManhattanZip(zip)) {
            return {
                color: '#2b5f89',
                weight: 1.25,
                fillColor: '#2b5f89',
                fillOpacity: 0.22
            };
        }

        return {
            color: '#66bac7',
            weight: 1.15,
            fillColor: '#2bb3c0',
            fillOpacity: 0.14
        };
    }

    function hoverStyle(zip) {
        if (isManhattanZip(zip)) {
            return {
                color: '#173d59',
                weight: 2.4,
                fillColor: '#2b5f89',
                fillOpacity: 0.42
            };
        }

        return {
            color: '#188f9c',
            weight: 2.2,
            fillColor: '#2bb3c0',
            fillOpacity: 0.34
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

        if (!mapNode || typeof window.L === 'undefined' || mapNode.dataset.mapBound === 'true') {
            return;
        }

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
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initServiceAreaMap);
    } else {
        initServiceAreaMap();
    }

    window.addEventListener('pageshow', initServiceAreaMap);
})();
