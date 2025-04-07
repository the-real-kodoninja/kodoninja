<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$fid = isset($_POST['fid']) ? (int)$_POST['fid'] : 0;
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
$uid = getCurrentUserId();

if ($fid == 0 || empty($comment) || !$uid) {
    echo json_encode(['success' => false, 'message' => 'Invalid input or user not logged in']);
    exit;
}

$stmt = $db->prepare("INSERT INTO forum_comments (fid, uid, comment, date) VALUES (?, ?, ?, NOW())");
$stmt->bind_param('iis', $fid, $uid, $comment);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add comment']);
}

$stmt->close();
