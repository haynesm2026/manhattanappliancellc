(() => {
    const dataUrl = '/assets/data/service-areas.json';

    if (!window.MANHATTAN_APPLIANCE_SERVICE_AREA_DATA) {
        window.MANHATTAN_APPLIANCE_SERVICE_AREA_ERROR = null;
        window.MANHATTAN_APPLIANCE_SERVICE_AREA_DATA = fetch(dataUrl)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`Failed to load service area data (${response.status})`);
                }

                return response.json();
            })
            .then((data) => {
                window.MANHATTAN_APPLIANCE_SERVICE_ZIPS = Array.isArray(data.service_zips) ? data.service_zips : [];
                return data;
            })
            .catch((error) => {
                console.error(error);
                window.MANHATTAN_APPLIANCE_SERVICE_AREA_ERROR = error;
                const fallback = {
                    service_zips: [],
                    zip_area_names: {},
                    manhattan_areas: [],
                    new_jersey_areas: []
                };

                window.MANHATTAN_APPLIANCE_SERVICE_ZIPS = [];
                return fallback;
            });
    }
})();
