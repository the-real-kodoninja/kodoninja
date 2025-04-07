<?php
session_start();

define('BASE_PATH', dirname(__DIR__) . '/');

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function sanitize($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function getCurrentUser() {
    global $db;
    if (!isLoggedIn()) return null;
    $user = $db->fetch("SELECT * FROM users WHERE id = ?", [$_SESSION['user_id']]);
    return $user ?: null;
}

function formatDate($datetime) {
    return date('F j, Y', strtotime($datetime));
}

function highlightMentions($text) {
    // Highlight @mentions and #hashtags
    $text = preg_replace('/@(\w+)/', '<a href="/?page=profile&username=$1" class="mention">@$1</a>', $text);
    $text = preg_replace('/#(\w+)/', '<a href="/?page=search&q=$1" class="hashtag">#$1</a>', $text);
    return $text;
}
