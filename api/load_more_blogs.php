<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 4;

$blogsResult = $db->getAllBlogs($offset, $limit);
$blogs = [];
while ($blog = $blogsResult->fetchArray(SQLITE3_ASSOC)) {
    $blog['likes'] = $db->getLikesCount($blog['id']);
    $blogs[] = $blog;
}

echo json_encode(['blogs' => $blogs]);
