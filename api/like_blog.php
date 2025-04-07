<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$bid = isset($_POST['bid']) ? (int)$_POST['bid'] : 0;
$uid = 1; // Hardcoded for testing; implement user authentication

if ($bid == 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid blog ID']);
    exit;
}

// Check if already liked
$check_query = "SELECT * FROM blog_upvote WHERE bid = $bid AND uid = $uid";
$check_result = $db->query($check_query);

if ($check_result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Already liked']);
    exit;
}

// Add like
$insert_query = "INSERT INTO blog_upvote (bid, uid, date) VALUES ($bid, $uid, NOW())";
$db->query($insert_query);

// Get updated like count
$count_query = "SELECT COUNT(*) as likes FROM blog_upvote WHERE bid = $bid";
$count_result = $db->query($count_query);
$likes = $count_result->fetch_assoc()['likes'];

echo json_encode(['success' => true, 'likes' => $likes]);
