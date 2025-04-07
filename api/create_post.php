<?php
require_once '../includes/core.php';
require_once '../includes/db.php';

if (!isLoggedIn()) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$type = $_POST['type'] ?? 'post';
$content = $_POST['content'] ?? '';
$contribute_to = $_POST['contribute_to'] ?? null;
$contribute_type = $_POST['contribute_type'] ?? null;
$mint_nft = isset($_POST['mint_nft']) ? 1 : 0;

$user = getCurrentUser();
$uid = $user['id'];
$nft_id = null;

if ($mint_nft) {
    // Simulate NFT minting with Motoko (placeholder)
    $nft_id = 'NFT_' . uniqid(); // Replace with actual Motoko integration
}

if ($contribute_to && $contribute_type) {
    // Handle contribution
    $table = $contribute_type === 'blog' ? 'blog_comments' : ($contribute_type === 'forum' ? 'forum_comments' : 'goal_comments');
    $id_field = $contribute_type === 'blog' ? 'brid' : ($contribute_type === 'forum' ? 'frid' : 'grid');
    $sql = "INSERT INTO $table ($id_field, opid, aid1, aid2, type, data, postdate) VALUES (?, ?, ?, ?, 'a', ?, NOW())";
    $db->query($sql, [$contribute_to, $uid, $uid, $uid, $content]);
} else {
    // Create new post, blog, forum, or goal
    if ($type === 'post') {
        $sql = "INSERT INTO user_post (opid, aid1, aid2, aid3, type, data, postdate, title, nft_id) VALUES (?, ?, ?, ?, 'a', ?, NOW(), ?, ?)";
        $db->query($sql, [$uid, $uid, $uid, $uid, $content, 'Untitled Post', $nft_id]);
    } elseif ($type === 'blog') {
        $sql = "INSERT INTO blog (uid, type, title, category, data, date, nft_id) VALUES (?, 'a', ?, 'General', ?, NOW(), ?)";
        $db->query($sql, [$uid, 'New Blog Post', $content, $nft_id]);
    } elseif ($type === 'forum') {
        $sql = "INSERT INTO forum (osid, uid, type, title, category, data, date, nft_id) VALUES (0, ?, 'a', ?, 'General', ?, NOW(), ?)";
        $db->query($sql, [$uid, 'New Forum Post', $content, $nft_id]);
    } elseif ($type === 'goal') {
        $sql = "INSERT INTO goal (uid, type, title, category, data, date, startdate, enddate, nft_id) VALUES (?, 'a', ?, 'General', ?, NOW(), NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), ?)";
        $db->query($sql, [$uid, 'New Goal', $content, $nft_id]);
    }
}

echo json_encode(['success' => true, 'redirect' => '/?page=feed']);
