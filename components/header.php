<header class="header">
    <button class="menu-toggle" id="menu-toggle">☰</button>
    <a href="?page=home" class="logo">kodoninja</a>
    <div class="search-container">
        <input type="text" class="search-bar" id="search-bar" placeholder="Search posts, goals, blogs...">
        <div class="search-dropdown" id="search-dropdown" style="display: none;">
            <div class="search-suggestion">Recent: "Mindfulness Tips"</div>
            <div class="search-suggestion">Recent: "Goal Setting 101"</div>
            <div class="search-suggestion">Trending: "Self-Improvement"</div>
        </div>
    </div>
    <div class="header-actions">
        <div class="notification-container">
            <button class="notification-btn" id="notification-btn">🔔</button>
            <span class="notification-badge">3</span>
            <div class="notification-dropdown" id="notification-dropdown" style="display: none;">
                <div class="notification-item">KodoSage liked your post!</div>
                <div class="notification-item">New comment on your blog.</div>
                <div class="notification-item">Follow request from NinjaMaster.</div>
            </div>
        </div>
        <a href="?page=profile" class="user-icon">
            <img src="assets/images/profiles/kodoninja.jpg" alt="User">
        </a>
    </div>
</header>
<div class="sidebar" id="sidebar">
    <nav class="sidebar-nav">
        <?php
        $current_page = $_GET['page'] ?? 'home';
        $pages = [
            'Home' => 'home',
            'Feed' => 'feed',
            'Kodoverse' => 'kodoverse',
            'Post' => 'post',
            'Profile' => 'profile',
            'Goals' => 'goals',
            'Blogs' => 'blogs',
            'Messages' => 'messages',
            'Settings' => 'settings',
            'Logout' => 'logout'
        ];
        ?>
        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-toggle"><?php echo array_search($current_page, $pages); ?></button>
                <div class="accordion-content" style="display: none;">
                    <?php foreach ($pages as $name => $page): ?>
                        <?php if ($page !== $current_page): ?>
                            <a href="?page=<?php echo $page; ?>" class="sidebar-link"><?php echo $name; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <button class="theme-toggle" id="theme-toggle">🌙</button>
    </nav>
    <div class="trending-feed">
        <h3>Trending on kodoninja</h3>
        <div class="trending-item">KodoSage shared a new goal: "Run a Marathon"</div>
        <div class="trending-item">NinjaMaster posted: "Top 5 Mindfulness Tips"</div>
        <div class="trending-item">KodoWise commented: "Great insights!"</div>
        <div class="trending-item">New follower: KodoStar</div>
    </div>
</div>
