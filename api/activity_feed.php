<?php
require_once '../includes/core.php';
require_once '../includes/db.php';

$activity = [];

// Fetch recent posts
$posts = $db->fetchAll("SELECT u.username, 'created a post: ' || up.title AS action, up.postdate AS timestamp 
                        FROM user_post up 
                        JOIN users u ON up.opid = u.id 
                        WHERE up.remove = '0' AND up.hide = '0' 
                        ORDER BY up.postdate DESC LIMIT 5");

// Fetch recent blogs
$blogs = $db->fetchAll("SELECT u.username, 'wrote a blog: ' || b.title AS action, b.date AS timestamp 
                        FROM blog b 
                        JOIN users u ON b.uid = u.id 
                        WHERE b.remove = '0' AND b.hide = '0' 
                        ORDER BY b.date DESC LIMIT 5");

// Fetch recent forums
$forums = $db->fetchAll("SELECT u.username, 'started a forum: ' || f.title AS action, f.date AS timestamp 
                         FROM forum f 
                         JOIN users u ON f.uid = u.id 
                         WHERE f.remove = '0' AND f.hide = '0' 
                         ORDER BY f.date DESC LIMIT 5");

// Fetch recent goals
$goals = $db->fetchAll("SELECT u.username, 'set a goal: ' || g.title AS action, g.date AS timestamp 
                        FROM goal g 
                        JOIN users u ON g.uid = u.id 
                        WHERE g.remove = '0' AND g.hide = '0' 
                        ORDER BY g.date DESC LIMIT 5");

// Fetch recent user activity (e.g., follows, likes)
$user_activity = $db->fetchAll("SELECT u1.username, 'followed ' || u2.username AS action, f.follow_date AS timestamp 
                                FROM follows f 
                                JOIN users u1 ON f.follower_id = u1.id 
                                JOIN users u2 ON f.followed_id = u2.id 
                                ORDER BY f.follow_date DESC LIMIT 5");

// Fetch recent NFT mints (simulated)
$nft_mints = $db->fetchAll("SELECT u.username, 'minted an NFT: ' || up.title AS action, up.postdate AS timestamp 
                            FROM user_post up 
                            JOIN users u ON up.opid = u.id 
                            WHERE up.nft_id IS NOT NULL AND up.remove = '0' AND up.hide = '0' 
                            ORDER BY up.postdate DESC LIMIT 5");

// Fetch recent airdrops (simulated)
$airdrops = $db->fetchAll("SELECT u.username, 'received an airdrop' AS action, CURRENT_TIMESTAMP AS timestamp 
                           FROM users u 
                           ORDER BY RANDOM() LIMIT 3");

$activity = array_merge($posts, $blogs, $forums, $goals, $user_activity, $nft_mints, $airdrops);
usort($activity, function($a, $b) {
    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
});
$activity = array_slice($activity, 0, 10);

header('Content-Type: application/json');
echo json_encode($activity);
