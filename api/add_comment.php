<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$bid = isset($_POST['bid']) ? (int)$_POST['bid'] : 0;
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
$uid = 1; // Hardcoded for testing; implement user authentication

if ($bid == 0 || empty($comment)) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

$stmt = $db->prepare("INSERT INTO blog_comments (bid, uid, comment, date) VALUES (?, ?, ?, NOW())");
$stmt->bind_param('iis', $bid, $uid, $comment);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add comment']);
}

$stmt->close();
