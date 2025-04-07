<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 10;

$query = "SELECT g.*, u.username 
          FROM goal g 
          JOIN users u ON g.uid = u.id 
          WHERE g.remove = '0' AND g.hide = '0' 
          ORDER BY g.date DESC 
          LIMIT $limit OFFSET $offset";
$result = $db->query($query);

$goals = [];
while ($goal = $result->fetch_assoc()) {
    $upvote_query = "SELECT COUNT(*) as likes FROM goal_upvote WHERE gid = " . $goal['gid'];
    $upvote_result = $db->query($upvote_query);
    $goal['likes'] = $upvote_result->fetch_assoc()['likes'];
    $goals[] = $goal;
}

echo json_encode($goals);
