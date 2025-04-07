document.addEventListener('DOMContentLoaded', () => {
    // Theme Toggle
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    let currentTheme = localStorage.getItem('theme') || 'dark-mode';

    body.classList.add(currentTheme);
    themeToggle.textContent = currentTheme === 'dark-mode' ? '🌙' : currentTheme === 'light-mode' ? '☀️' : '⚪';

    themeToggle.addEventListener('click', () => {
        if (currentTheme === 'dark-mode') {
            currentTheme = 'light-mode';
            themeToggle.textContent = '☀️';
        } else if (currentTheme === 'light-mode') {
            currentTheme = 'white-mode';
            themeToggle.textContent = '⚪';
        } else {
            currentTheme = 'dark-mode';
            themeToggle.textContent = '🌙';
        }
        body.className = currentTheme;
        localStorage.setItem('theme', currentTheme);
    });

    // Menu Toggle
    const menuToggleBtn = document.getElementById('menu-toggle-btn');
    const menuDropdown = document.getElementById('menu-dropdown');

    menuToggleBtn.addEventListener('click', () => {
        menuDropdown.classList.toggle('active');
    });

    // Accordion
    const accordionHeader = document.querySelector('.accordion-header');
    const accordionContent = document.querySelector('.accordion-content');

    // Ensure accordion is collapsed initially
    accordionContent.classList.remove('active');
    accordionHeader.textContent = accordionHeader.textContent.replace('▲', '▼');

    accordionHeader.addEventListener('click', () => {
        accordionContent.classList.toggle('active');
        accordionHeader.textContent = accordionContent.classList.contains('active') ? accordionHeader.textContent.replace('▼', '▲') : accordionHeader.textContent.replace('▲', '▼');
    });

    // Search Bar Expand/Retract
    const searchInput = document.getElementById('search-input');
    const searchDropdown = document.getElementById('search-dropdown');

    searchInput.addEventListener('focus', () => {
    searchInput.parentElement.parentElement.style.maxWidth = '600px';
    searchDropdown.classList.add('active');
    // Simulate Pinterest/Facebook-like search suggestions
    searchDropdown.innerHTML = `
        <a href="/?page=profile&q=${searchInput.value}"><span>👤</span> Users: ${searchInput.value || 'Search for users'}</a>
        <a href="/?page=blogs&q=${searchInput.value}"><span>📝</span> Blogs: ${searchInput.value || 'Search for blogs'}</a>
        <a href="/?page=goals&q=${searchInput.value}"><span>🎯</span> Goals: ${searchInput.value || 'Search for goals'}</a>
        <a href="/?page=forums&q=${searchInput.value}"><span>💬</span> Forums: ${searchInput.value || 'Search for forums'}</a>
    `;
});

searchInput.addEventListener('blur', () => {
    searchInput.parentElement.parentElement.style.maxWidth = '400px';
    setTimeout(() => {
        searchDropdown.classList.remove('active');
    }, 200);
});

searchInput.addEventListener('input', () => {
    if (searchInput.value.trim() === '') {
        searchDropdown.innerHTML = `
            <a href="/?page=profile"><span>👤</span> Users: Search for users</a>
            <a href="/?page=blogs"><span>📝</span> Blogs: Search for blogs</a>
            <a href="/?page=goals"><span>🎯</span> Goals: Search for goals</a>
            <a href="/?page=forums"><span>💬</span> Forums: Search for forums</a>
        `;
        searchDropdown.classList.add('active');
    } else {
        searchDropdown.classList.add('active');
        searchDropdown.innerHTML = `
            <a href="/?page=profile&q=${searchInput.value}"><span>👤</span> Users: ${searchInput.value}</a>
            <a href="/?page=blogs&q=${searchInput.value}"><span>📝</span> Blogs: ${searchInput.value}</a>
            <a href="/?page=goals&q=${searchInput.value}"><span>🎯</span> Goals: ${searchInput.value}</a>
            <a href="/?page=forums&q=${searchInput.value}"><span>💬</span> Forums: ${searchInput.value}</a>
        `;
    }
});

    // Activity Feed
    const activityList = document.getElementById('activity-list');
    const fetchActivity = () => {
        fetch('/api/activity_feed.php')
            .then(response => response.json())
            .then(data => {
                activityList.innerHTML = '';
                data.forEach(item => {
                    const activityItem = document.createElement('div');
                    activityItem.className = 'activity-item';
                    activityItem.innerHTML = `
                        <span>${item.username}</span> ${item.action} - <span>${new Date(item.timestamp).toLocaleTimeString()}</span>
                    `;
                    activityList.appendChild(activityItem);
                });
            });
    };

    fetchActivity();
    setInterval(fetchActivity, 30000); // Refresh every 30 seconds
});
