<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$input = json_decode(file_get_contents('php://input'), true);
$blogId = $input['blog_id'] ?? 0;
$userId = $input['user_id'] ?? '';
$comment = $input['comment'] ?? '';

if ($blogId && $userId && $comment) {
    $db->addComment($blogId, $userId, $comment);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
}
