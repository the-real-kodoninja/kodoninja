<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$gid = isset($_POST['gid']) ? (int)$_POST['gid'] : 0;
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
$uid = getCurrentUserId();

if ($gid == 0 || empty($comment) || !$uid) {
    echo json_encode(['success' => false, 'message' => 'Invalid input or user not logged in']);
    exit;
}

$stmt = $db->prepare("INSERT INTO goal_comments (gid, uid, comment, date) VALUES (?, ?, ?, NOW())");
$stmt->bind_param('iis', $gid, $uid, $comment);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add comment']);
}

$stmt->close();
