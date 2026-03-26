(() => {
    function initMobileMenu() {
        const button = document.querySelector('[data-mobile-menu-button]');
        const panel = document.querySelector('[data-mobile-menu]');
        const shell = document.querySelector('.nav-shell');
        const drawer = document.querySelector('[data-mobile-menu-drawer]');
        const openIcon = document.querySelector('[data-mobile-menu-open-icon]');
        const closeIcon = document.querySelector('[data-mobile-menu-close-icon]');

        if (!button || !openIcon || !closeIcon) {
            return;
        }

        const target = panel || shell;

        if (!target) {
            return;
        }

        if (button.dataset.mobileMenuBound === 'true') {
            return;
        }

        const setMenuState = (isOpen) => {
            if (panel) {
                panel.classList.toggle('opacity-0', !isOpen);
                panel.classList.toggle('pointer-events-none', !isOpen);
                if (drawer) {
                    drawer.classList.toggle('translate-x-full', !isOpen);
                }
                document.body.classList.toggle('overflow-hidden', isOpen);
            } else {
                target.classList.toggle('is-open', isOpen);
                document.body.classList.toggle('overflow-hidden', isOpen && window.innerWidth <= 900);
            }

            button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            openIcon.classList.toggle('hidden', isOpen);
            closeIcon.classList.toggle('hidden', !isOpen);
        };

        const toggleMenu = () => {
            setMenuState(button.getAttribute('aria-expanded') !== 'true');
        };

        button.addEventListener('click', toggleMenu);

        document.querySelectorAll('[data-mobile-menu-close]').forEach((node) => {
            node.addEventListener('click', () => setMenuState(false));
        });

        target.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 900) {
                    setMenuState(false);
                }
            });
        });

        button.dataset.mobileMenuBound = 'true';
        setMenuState(false);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileMenu);
    } else {
        initMobileMenu();
    }

    window.addEventListener('pageshow', initMobileMenu);
})();
