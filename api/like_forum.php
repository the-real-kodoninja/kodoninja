<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$fid = isset($_POST['fid']) ? (int)$_POST['fid'] : 0;
$uid = getCurrentUserId();

if ($fid == 0 || !$uid) {
    echo json_encode(['success' => false, 'message' => 'Invalid forum ID or user not logged in']);
    exit;
}

$check_query = "SELECT * FROM forum_upvote WHERE fid = $fid AND uid = $uid";
$check_result = $db->query($check_query);

if ($check_result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Already liked']);
    exit;
}

$insert_query = "INSERT INTO forum_upvote (fid, uid, date) VALUES ($fid, $uid, NOW())";
$db->query($insert_query);

$count_query = "SELECT COUNT(*) as likes FROM forum_upvote WHERE fid = $fid";
$count_result = $db->query($count_query);
$likes = $count_result->fetch_assoc()['likes'];

echo json_encode(['success' => true, 'likes' => $likes]);
