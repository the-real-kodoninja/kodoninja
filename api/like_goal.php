<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$gid = isset($_POST['gid']) ? (int)$_POST['gid'] : 0;
$uid = getCurrentUserId();

if ($gid == 0 || !$uid) {
    echo json_encode(['success' => false, 'message' => 'Invalid goal ID or user not logged in']);
    exit;
}

$check_query = "SELECT * FROM goal_upvote WHERE gid = $gid AND uid = $uid";
$check_result = $db->query($check_query);

if ($check_result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Already liked']);
    exit;
}

$insert_query = "INSERT INTO goal_upvote (gid, uid, date) VALUES ($gid, $uid, NOW())";
$db->query($insert_query);

$count_query = "SELECT COUNT(*) as likes FROM goal_upvote WHERE gid = $gid";
$count_result = $db->query($count_query);
$likes = $count_result->fetch_assoc()['likes'];

echo json_encode(['success' => true, 'likes' => $likes]);
