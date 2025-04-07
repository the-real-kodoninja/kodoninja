<?php
require_once '../includes/core.php';
require_once '../includes/db.php';

if (!isLoggedIn()) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$type = $_POST['type'] ?? 'savings';
$amount = (float)($_POST['amount'] ?? 0);
$duration = (int)($_POST['duration'] ?? 0);
$interest = (float)($_POST['interest'] ?? 0);

$user = getCurrentUser();
$uid = $user['id'];

// Simple calculation (replace with real logic)
$result = $amount * (1 + ($interest / 100) * ($duration / 12));

// Save to database
$data = json_encode(['amount' => $amount, 'duration' => $duration, 'interest' => $interest, 'result' => $result]);
$sql = "INSERT INTO financial_calculations (uid, type, data, date) VALUES (?, ?, ?, NOW())";
$db->query($sql, [$uid, $type, $data]);

echo json_encode(['success' => true, 'result' => number_format($result, 2)]);
