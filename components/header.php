<?php
$user = getCurrentUser();

// Fetch notification count
$notification_count = 0;
if ($user) {
    $notification_count = $db->fetch("SELECT COUNT(*) as count FROM notifications WHERE uid = ? AND is_read = 0", [$user['id']])['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? sanitize($page_title) : 'Kodoninja'; ?></title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/assets/css/styles.css?v=1.3">
    <!-- Core Styles -->
    <link rel="stylesheet" href="/assets/css/core.css?v=1.3">
    <!-- Component Styles -->
    <link rel="stylesheet" href="/assets/css/components/header.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/components/button.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/components/post.css?v=1.3">
    <link rel="stylesheet" href="/assets/css/components/nimbus.css?v=1.3">
    <!-- Page-Specific Styles -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $css_files = [
        'home' => ['pages/home.css'],
        'feed' => ['pages/feed.css'],
        'post' => ['pages/post.css'],
        'blog' => ['pages/blog.css'],
        'blogs' => ['pages/blogs.css'],
        'forum' => ['pages/forum.css'],
        'forums' => ['pages/forums.css'],
        'goal' => ['pages/goals.css'],
        'goals' => ['pages/goals.css'],
        'kodoverse' => ['pages/kodoverse.css'],
        'tests' => ['pages/tests.css'],
        'financial_calculator' => ['pages/financial_calculator.css'],
        'groups' => ['pages/groups.css'],
        'pages' => ['pages/pages.css'],
        'lists' => ['pages/lists.css'],
        'nimbus' => ['pages/nimbus.css'],
        'profile' => ['pages/profile.css'],
        'messages' => ['pages/messages.css'],
        'settings' => ['pages/settings.css'],
        'notifications' => ['pages/notifications.css'],
        'downloads' => ['pages/downloads.css'],
        'news' => ['pages/news.css'],
        'support' => ['pages/support.css'],
        'waitlist' => ['pages/waitlist.css'],
        'payments' => ['pages/payments.css'],
        'login' => ['pages/login.css'],
        'register' => ['pages/register.css'],
    ];
    if (isset($css_files[$page])) {
        foreach ($css_files[$page] as $css_file) {
            echo "<link rel=\"stylesheet\" href=\"/assets/css/$css_file?v=1.3\">";
        }
    }
    ?>
    <script src="/assets/js/core.js?v=1.3" defer></script>
    <?php
    $js_files = [
        'feed' => ['pages/feed.js'],
        'post' => ['pages/post.js'],
        'blog' => ['pages/blog.js'],
        'blogs' => ['pages/blogs.js'],
        'forum' => ['pages/forum.js'],
        'forums' => ['pages/forums.js'],
        'goal' => ['pages/goal.js'],
        'goals' => ['pages/goals.js'],
        'kodoverse' => ['pages/kodoverse.js'],
        'tests' => ['pages/tests.js'],
        'financial_calculator' => ['pages/financial_calculator.js'],
        'groups' => ['pages/groups.js'],
        'pages' => ['pages/pages.js'],
        'lists' => ['pages/lists.js'],
        'nimbus' => ['pages/nimbus.js'],
        'profile' => ['pages/profile.js'],
        'login' => ['pages/login.js'],
        'register' => ['pages/register.js'], // Added register page
    ];
    if (isset($js_files[$page])) {
        foreach ($js_files[$page] as $js_file) {
            echo "<script src=\"/assets/js/$js_file?v=1.3\" defer></script>";
        }
    }
    ?>
</head>
<body class="dark-mode">
    <header class="main-header">
        <div class="header-container">
            <div class="menu-toggle">
                <button id="menu-toggle-btn">☰</button>
            </div>
            <div class="logo">
                <a href="/">Kodoninja</a>
            </div>
            <div class="search-bar">
                <div class="search-wrapper">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Search posts, goals, blogs..." id="search-input">
                </div>
                <div class="search-dropdown" id="search-dropdown"></div>
            </div>
            <div class="user-actions">
                <div class="notifications">
                    <a href="/?page=notifications" class="notification-icon">🔔</a>
                    <?php if ($notification_count > 0): ?>
                        <span class="notification-badge"><?php echo $notification_count; ?></span>
                    <?php endif; ?>
                </div>
                <?php if ($user): ?>
                    <div class="user-menu">
                        <a href="/?page=profile">
                            <img src="/assets/images/profiles/<?php echo $user['username']; ?>.jpg" alt="Avatar" class="user-avatar" onerror="this.src='/assets/images/default-avatar.png'">
                        </a>
                    </div>
                <?php else: ?>
                    <a href="/?page=login" class="login-btn">Login</a>
                    <a href="/?page=register" class="register-btn">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="menu-dropdown" id="menu-dropdown">
        <div class="menu-content">
            <div class="menu-nav">
                <div class="accordion">
                    <div class="accordion-item">
                        <button class="accordion-header"><?php echo ucfirst($page); ?> ▼</button>
                        <div class="accordion-content">
                            <a href="/?page=home" class="<?php echo $page === 'home' ? 'active' : ''; ?>">Home</a>
                            <a href="/?page=feed" class="<?php echo $page === 'feed' ? 'active' : ''; ?>">Feed</a>
                            <a href="/?page=kodoverse" class="<?php echo $page === 'kodoverse' ? 'active' : ''; ?>">Kodoverse</a>
                            <a href="/?page=blogs" class="<?php echo $page === 'blogs' ? 'active' : ''; ?>">Blogs</a>
                            <a href="/?page=forums" class="<?php echo $page === 'forums' ? 'active' : ''; ?>">Forums</a>
                            <a href="/?page=goals" class="<?php echo $page === 'goals' ? 'active' : ''; ?>">Goals</a>
                            <a href="/?page=groups" class="<?php echo $page === 'groups' ? 'active' : ''; ?>">Groups</a>
                            <a href="/?page=pages" class="<?php echo $page === 'pages' ? 'active' : ''; ?>">Pages</a>
                            <a href="/?page=tests" class="<?php echo $page === 'tests' ? 'active' : ''; ?>">Tests & Quizzes</a>
                            <a href="/?page=financial_calculator" class="<?php echo $page === 'financial_calculator' ? 'active' : ''; ?>">Financial Calculator</a>
                            <a href="/?page=nimbus" class="<?php echo $page === 'nimbus' ? 'active' : ''; ?>">Nimbus</a>
                            <a href="/?page=profile" class="<?php echo $page === 'profile' ? 'active' : ''; ?>">Profile</a>
                            <a href="/?page=messages" class="<?php echo $page === 'messages' ? 'active' : ''; ?>">Messages</a>
                            <a href="/?page=notifications" class="<?php echo $page === 'notifications' ? 'active' : ''; ?>">Notifications</a>
                            <a href="/?page=downloads" class="<?php echo $page === 'downloads' ? 'active' : ''; ?>">Downloads</a>
                            <a href="/?page=news" class="<?php echo $page === 'news' ? 'active' : ''; ?>">News</a>
                            <a href="/?page=support" class="<?php echo $page === 'support' ? 'active' : ''; ?>">Support</a>
                            <a href="/?page=waitlist" class="<?php echo $page === 'waitlist' ? 'active' : ''; ?>">Waitlist</a>
                            <a href="/?page=payments" class="<?php echo $page === 'payments' ? 'active' : ''; ?>">Payments</a>
                            <a href="/?page=lists" class="<?php echo $page === 'lists' ? 'active' : ''; ?>">Lists</a>
                        </div>
                    </div>
                </div>
                <div class="menu-actions">
                    <button class="theme-toggle" id="theme-toggle">🌙</button>
                    <?php if ($user): ?>
                        <a href="/?page=settings" class="settings-btn">Settings</a>
                        <a href="/?page=logout" class="logout-btn">Logout</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="activity-feed">
                <h3>Activity Feed</h3>
                <div class="activity-list" id="activity-list">
                    <!-- Activity items will be loaded via JavaScript -->
                </div>
            </div>
        </div>
    </div>
    <main class="container">
