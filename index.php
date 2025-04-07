<?php
define('BASE_PATH', __DIR__ . '/');
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : null;

// Handle social login actions on the login page
if ($page === 'login' && $action) {
    if ($action === 'login_x') {
        // Placeholder for X OAuth login
        $error = 'Logging in with X... (Implement OAuth2 for X)';
        include BASE_PATH . 'pages/login.php';
        exit;
    } elseif ($action === 'login_bluesky') {
        // Placeholder for Bluesky OAuth login
        $error = 'Logging in with Bluesky... (Implement OAuth2 for Bluesky)';
        include BASE_PATH . 'pages/login.php';
        exit;
    } elseif ($action === 'login_mastodon') {
        // Placeholder for Mastodon OAuth login
        $error = 'Logging in with Mastodon... (Implement OAuth2 for Mastodon)';
        include BASE_PATH . 'pages/login.php';
        exit;
    } elseif ($action === 'login_kodoverse') {
        // Kodoverse login (Coming Soon)
        header('Location: /?page=login&kodoverse_message=Coming Soon');
        exit;
    }
}

// Handle social login actions on the register page
if ($page === 'register' && $action) {
    if ($action === 'login_x') {
        // Placeholder for X OAuth registration
        $error = 'Registering with X... (Implement OAuth2 for X)';
        include BASE_PATH . 'pages/register.php';
        exit;
    } elseif ($action === 'login_bluesky') {
        // Placeholder for Bluesky OAuth registration
        $error = 'Registering with Bluesky... (Implement OAuth2 for Bluesky)';
        include BASE_PATH . 'pages/register.php';
        exit;
    } elseif ($action === 'login_mastodon') {
        // Placeholder for Mastodon OAuth registration
        $error = 'Registering with Mastodon... (Implement OAuth2 for Mastodon)';
        include BASE_PATH . 'pages/register.php';
        exit;
    } elseif ($action === 'login_kodoverse') {
        // Kodoverse registration (Coming Soon)
        header('Location: /?page=register&kodoverse_message=Coming Soon');
        exit;
    }
}

$pages = [
    'home' => 'home.php',
    'feed' => 'feed.php',
    'post' => 'post.php',
    'blog' => 'blog.php',
    'blogs' => 'blogs.php',
    'forum' => 'forum.php',
    'forums' => 'forums.php',
    'goal' => 'goal.php',
    'goals' => 'goals.php',
    'kodoverse' => 'kodoverse.php',
    'tests' => 'tests.php',
    'financial_calculator' => 'financial_calculator.php',
    'groups' => 'groups.php',
    'pages' => 'pages.php',
    'lists' => 'lists.php',
    'nimbus' => 'nimbus.php',
    'profile' => 'profile.php',
    'messages' => 'messages.php',
    'settings' => 'settings.php',
    'notifications' => 'notifications.php',
    'downloads' => 'downloads.php',
    'news' => 'news.php',
    'support' => 'support.php',
    'waitlist' => 'waitlist.php',
    'payments' => 'payments.php',
    'login' => 'login.php',
    'register' => 'register.php',
    'logout' => 'logout.php',
];

if (isset($pages[$page])) {
    include BASE_PATH . 'pages/' . $pages[$page];
} else {
    http_response_code(404);
    include BASE_PATH . 'pages/home.php'; // Fallback to home page
}
