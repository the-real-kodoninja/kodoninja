<?php
header('Content-Type: application/json');

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $upload_dir = 'assets/images/posts/';
    if ($file['type'] === 'video/mp4' || $file['type'] === 'video/webm') {
        $upload_dir = 'assets/videos/posts/';
    }

    $file_path = $upload_dir . uniqid() . '-' . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        echo json_encode(['location' => $file_path]);
    } else {
        echo json_encode(['error' => 'Failed to upload file']);
    }
} else {
    echo json_encode(['error' => 'No file uploaded']);
}
