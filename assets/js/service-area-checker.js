(() => {
    const serviceZips = new Set(window.MANHATTAN_APPLIANCE_SERVICE_ZIPS || []);

    function initServiceAreaChecker() {
        const input = document.querySelector('[data-service-zip-input]');
        const button = document.querySelector('[data-service-zip-button]');
        const result = document.querySelector('[data-service-zip-result]');

        if (!input || !button || !result || button.dataset.zipCheckerBound === 'true') {
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
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initServiceAreaChecker);
    } else {
        initServiceAreaChecker();
    }

    window.addEventListener('pageshow', initServiceAreaChecker);
})();
