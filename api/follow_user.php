<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$uid = getCurrentUserId();
$cuid = isset($_POST['uid']) ? (int)$_POST['uid'] : 0;

if (!$uid || $cuid == 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid user ID or not logged in']);
    exit;
}

$check_query = "SELECT * FROM connections WHERE uid = $uid AND cuid = $cuid";
$check_result = $db->query($check_query);

if ($check_result->num_rows > 0) {
    $delete_query = "DELETE FROM connections WHERE uid = $uid AND cuid = $cuid";
    $db->query($delete_query);
    echo json_encode(['success' => true, 'action' => 'unfollowed']);
} else {
    $insert_query = "INSERT INTO connections (uid, cuid, date) VALUES ($uid, $cuid, NOW())";
    $db->query($insert_query);
    echo json_encode(['success' => true, 'action' => 'followed']);
}
