<?php
declare(strict_types=1);

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        require_once 'pages/home.php';
        render_home();
        break;
    case 'feed':
        require_once 'pages/feed.php';
        render_feed();
        break;
    case 'kodoverse':
        require_once 'pages/kodoverse.php';
        render_kodoverse();
        break;
    case 'post':
        require_once 'pages/post.php';
        render_post();
        break;
    case 'profile':
        require_once 'pages/profile.php';
        render_profile();
        break;
    case 'goals':
        require_once 'pages/goals.php';
        render_goals();
        break;
    case 'blogs':
        require_once 'pages/blogs.php';
        render_blogs();
        break;
    case 'blog':
        require_once 'pages/blog.php';
        render_blog();
        break;
    case 'messages':
        require_once 'pages/messages.php';
        render_messages();
        break;
    case 'settings':
        require_once 'pages/settings.php';
        render_settings();
        break;
    case 'privacy':
        require_once 'pages/privacy.php';
        render_privacy();
        break;
    case 'terms':
        require_once 'pages/terms.php';
        render_terms();
        break;
    case 'logout':
        require_once 'pages/logout.php';
        render_logout();
        break;
    default:
        require_once 'pages/home.php';
        render_home();
        break;
}
