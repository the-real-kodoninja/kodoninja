<?php
require_once '../includes/core.php';
require_once '../includes/db.php';

if (!isLoggedIn()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$content = isset($data['content']) ? $data['content'] : '';

if (empty($content)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Content is required']);
    exit;
}

// Save draft to database
$user_id = getCurrentUser()['id'];
try {
    $db->execute("INSERT INTO drafts (uid, content, created_at) VALUES (?, ?, NOW())", [$user_id, $content]);
    echo json_encode(['success' => true, 'message' => 'Draft saved']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save draft: ' . $e->getMessage()]);
}
