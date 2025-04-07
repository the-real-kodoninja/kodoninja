<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/db.php';

if (!isset($_GET['username'])) {
    echo json_encode(['available' => false, 'message' => 'Username is required']);
    exit;
}

$username = $_GET['username'];

// Strip @ and .kodoninja.social if present
$username = preg_replace('/^@|\\.kodoninja\\.social$/', '', $username);

// Validate username format
if (!preg_match('/^[a-zA-Z0-9_]+$/', $username) || strlen($username) < 3) {
    echo json_encode(['available' => false, 'message' => 'Invalid username. Use letters, numbers, and underscores only, with at least 3 characters.']);
    exit;
}

// Check if username exists
$existing_user = $db->fetch("SELECT * FROM users WHERE username = ?", [$username]);

if ($existing_user) {
    echo json_encode(['available' => false, 'message' => 'Username is already taken']);
} else {
    echo json_encode(['available' => true, 'message' => 'Username is available']);
}
exit;
