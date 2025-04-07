<?php
require_once '../includes/core.php';
require_once '../includes/db.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * 10;

$feed_items = [];
$posts = $db->fetchAll("SELECT up.pid AS id, 'post' AS type, up.opid AS uid, up.title, up.data, up.postdate AS date, up.v_count, up.views, up.nft_id, u.username 
                        FROM user_post up 
                        JOIN users u ON up.opid = u.id 
                        WHERE up.remove = '0' AND up.hide = '0' 
                        ORDER BY up.postdate DESC LIMIT 10 OFFSET ?", [$offset]);
$blogs = $db->fetchAll("SELECT b.bid AS id, 'blog' AS type, b.uid, b.title, b.data, b.date, b.v_count, b.views, b.nft_id, u.username 
                        FROM blog b 
                        JOIN users u ON b.uid = u.id 
                        WHERE b.remove = '0' AND b.hide = '0' 
                        ORDER BY b.date DESC LIMIT 10 OFFSET ?", [$offset]);
$forums = $db->fetchAll("SELECT f.fid AS id, 'forum' AS type, f.uid, f.title, f.data, f.date, f.v_count, f.views, f.nft_id, u.username 
                         FROM forum f 
                         JOIN users u ON f.uid = u.id 
                         WHERE f.remove = '0' AND f.hide = '0' 
                         ORDER BY f.date DESC LIMIT 10 OFFSET ?", [$offset]);
$goals = $db->fetchAll("SELECT g.gid AS id, 'goal' AS type, g.uid, g.title, g.data, g.date, g.v_count, g.views, g.nft_id, u.username 
                        FROM goal g 
                        JOIN users u ON g.uid = u.id 
                        WHERE g.remove = '0' AND g.hide = '0' 
                        ORDER BY g.date DESC LIMIT 10 OFFSET ?", [$offset]);

$feed_items = array_merge($posts, $blogs, $forums, $goals);
usort($feed_items, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});
$feed_items = array_slice($feed_items, 0, 10);

header('Content-Type: application/json');
echo json_encode($feed_items);
