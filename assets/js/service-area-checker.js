(() => {
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

    function showUnavailableState(result, input, button) {
        if (input) {
            input.disabled = true;
            input.setAttribute('aria-disabled', 'true');
        }

        if (button) {
            button.disabled = true;
            button.setAttribute('aria-disabled', 'true');
        }

        if (result) {
            result.textContent = 'We could not load the ZIP checker right now. Please call or email us and we will confirm service for you.';
            result.classList.remove('hidden');
            result.dataset.state = 'not-served';
        }
    }

    async function initServiceAreaChecker() {
        const input = document.querySelector('[data-service-zip-input]');
        const button = document.querySelector('[data-service-zip-button]');
        const result = document.querySelector('[data-service-zip-result]');

        if (!input || !button || !result || button.dataset.zipCheckerBound === 'true' || button.dataset.zipCheckerBound === 'loading') {
            return;
        }

        button.dataset.zipCheckerBound = 'loading';

        const failSafe = (error) => {
            console.error(error);
            showUnavailableState(result, input, button);
            delete button.dataset.zipCheckerBound;
        };

        try {
            const serviceAreaData = await getServiceAreaData();
            const serviceZips = new Set(serviceAreaData.service_zips || []);

            if (window.MANHATTAN_APPLIANCE_SERVICE_AREA_ERROR || serviceZips.size === 0) {
                showUnavailableState(result, input, button);
                delete button.dataset.zipCheckerBound;
                return;
            }

            const showResult = (message, isServed) => {
                result.textContent = message;
                result.classList.remove('hidden');
                result.dataset.state = isServed ? 'served' : 'not-served';
            };

            const checkZip = () => {
                const zip = input.value.trim().match(/^\d{5}$/)?.[0];

                if (!zip) {
                    showResult('Enter a valid 5-digit ZIP code.', false);
                    return;
                }

                if (serviceZips.has(zip)) {
                    showResult(`Good news: ZIP code ${zip} is in our current service area.`, true);
                    return;
                }

                showResult(`ZIP code ${zip} is not listed in our current service area. Contact us and we may still be able to help.`, false);
            };

            button.addEventListener('click', checkZip);
            input.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    checkZip();
                }
            });

            button.dataset.zipCheckerBound = 'true';
        } catch (error) {
            failSafe(error);
        }
    }

    const boot = () => {
        initServiceAreaChecker().catch((error) => console.error(error));
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }

    window.addEventListener('pageshow', boot);
})();
