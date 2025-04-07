<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 10;

$query = "SELECT b.*, u.username 
          FROM blog b 
          JOIN users u ON b.uid = u.id 
          WHERE b.approved = 'y' AND b.remove = '0' AND b.hide = '0' 
          ORDER BY b.date DESC 
          LIMIT $limit OFFSET $offset";
$result = $db->query($query);

$blogs = [];
while ($blog = $result->fetch_assoc()) {
    $upvote_query = "SELECT COUNT(*) as likes FROM blog_upvote WHERE bid = " . $blog['bid'];
    $upvote_result = $db->query($upvote_query);
    $blog['likes'] = $upvote_result->fetch_assoc()['likes'];
    $blogs[] = $blog;
}

echo json_encode($blogs);
