document.addEventListener('DOMContentLoaded', () => {
    // Prevent duplicate event listeners by ensuring this only runs once
    if (window.kodoninjaCoreInitialized) return;
    window.kodoninjaCoreInitialized = true;

    // Theme toggle
    const toggle = document.getElementById('theme-toggle');
    const body = document.body;
    if (toggle) {
        toggle.addEventListener('click', () => {
            body.dataset.theme = body.dataset.theme === 'dark' ? 'light' : 'dark';
            toggle.textContent = body.dataset.theme === 'dark' ? '🌙' : '☀️';
        });
    }

    // Sidebar toggle
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !menuToggle.contains(e.target) && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    }

    // Accordion toggle
    const accordionToggles = document.querySelectorAll('.accordion-toggle');
    accordionToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const content = toggle.nextElementSibling;
            content.classList.toggle('active');
        });
    });

    // Search dropdown
    const searchBar = document.getElementById('search-bar');
    const searchDropdown = document.getElementById('search-dropdown');
    if (searchBar && searchDropdown) {
        searchBar.addEventListener('focus', () => {
            searchDropdown.style.display = 'block';
        });

        searchBar.addEventListener('blur', () => {
            setTimeout(() => {
                searchDropdown.style.display = 'none';
            }, 200);
        });
    }

    // Notification dropdown
    const notificationBtn = document.getElementById('notification-btn');
    const notificationDropdown = document.getElementById('notification-dropdown');
    if (notificationBtn && notificationDropdown) {
        notificationBtn.addEventListener('click', () => {
            notificationDropdown.style.display = notificationDropdown.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', (e) => {
            if (!notificationBtn.contains(e.target) && !notificationDropdown.contains(e.target)) {
                notificationDropdown.style.display = 'none';
            }
        });
    }

    // Update footer year
    const footerYear = document.getElementById('footer-year');
    if (footerYear) {
        footerYear.textContent = new Date().getFullYear();
    }

    // Dynamically include all page-specific scripts
    const scripts = [
        'assets/js/pages/home.js',
        'assets/js/pages/feed.js',
        'assets/js/pages/post.js',
        'assets/js/pages/kodoverse.js',
        'assets/js/pages/profile.js',
        'assets/js/pages/goals.js',
        'assets/js/pages/blogs.js',
        'assets/js/pages/messages.js',
        'assets/js/pages/settings.js',
        'assets/js/pages/privacy.js',
        'assets/js/pages/terms.js'
    ];

    scripts.forEach(scriptSrc => {
        const script = document.createElement('script');
        script.src = scriptSrc + '?v=1';
        script.async = true;
        document.body.appendChild(script);
    });
});
