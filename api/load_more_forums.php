<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 10;

$query = "SELECT f.*, u.username 
          FROM forum f 
          JOIN users u ON f.uid = u.id 
          WHERE f.remove = '0' AND f.hide = '0' 
          ORDER BY f.date DESC 
          LIMIT $limit OFFSET $offset";
$result = $db->query($query);

$forums = [];
while ($forum = $result->fetch_assoc()) {
    $upvote_query = "SELECT COUNT(*) as likes FROM forum_upvote WHERE fid = " . $forum['fid'];
    $upvote_result = $db->query($upvote_query);
    $forum['likes'] = $upvote_result->fetch_assoc()['likes'];
    $forums[] = $forum;
}

echo json_encode($forums);
