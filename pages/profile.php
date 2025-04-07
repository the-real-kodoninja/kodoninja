<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$uid = isset($_GET['uid']) ? (int)$_GET['uid'] : getCurrentUserId();

if (!$uid) {
    redirect('/?page=login');
}

$user = getUserById($db, $uid);
if (!$user) {
    die("User not found");
}

$posts_query = "SELECT * FROM user_post WHERE uid = $uid AND remove = '0' AND hide = '0' ORDER BY date DESC LIMIT 5";
$posts_result = $db->query($posts_query);

$blogs_query = "SELECT * FROM blog WHERE uid = $uid AND approved = 'y' AND remove = '0' AND hide = '0' ORDER BY date DESC LIMIT 5";
$blogs_result = $db->query($blogs_query);

$goals_query = "SELECT * FROM goal WHERE uid = $uid AND remove = '0' AND hide = '0' ORDER BY date DESC LIMIT 5";
$goals_result = $db->query($goals_query);

$forums_query = "SELECT * FROM forum WHERE uid = $uid AND remove = '0' AND hide = '0' ORDER BY date DESC LIMIT 5";
$forums_result = $db->query($forums_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($user['username']); ?>'s Profile - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($user['username']); ?>'s Profile</h1>
        <button id="follow-btn" data-uid="<?php echo $uid; ?>">
            <?php
            $current_uid = getCurrentUserId();
            if ($current_uid && $current_uid != $uid) {
                $follow_query = "SELECT * FROM connections WHERE uid = $current_uid AND cuid = $uid";
                $follow_result = $db->query($follow_query);
                echo $follow_result->num_rows > 0 ? 'Unfollow' : 'Follow';
            }
            ?>
        </button>
        <h2>Recent Posts</h2>
        <div id="posts">
            <?php while ($post = $posts_result->fetch_assoc()): ?>
                <div class="user-post">
                    <h3><a href="?page=post&pid=<?php echo $post['pid']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                </div>
            <?php endwhile; ?>
        </div>
        <h2>Recent Blogs</h2>
        <div id="blogs">
            <?php while ($blog = $blogs_result->fetch_assoc()): ?>
                <div class="blog-post">
                    <h3><a href="?page=blog&bid=<?php echo $blog['bid']; ?>"><?php echo htmlspecialchars($blog['title']); ?></a></h3>
                </div>
            <?php endwhile; ?>
        </div>
        <h2>Recent Goals</h2>
        <div id="goals">
            <?php while ($goal = $goals_result->fetch_assoc()): ?>
                <div class="goal-post">
                    <h3><a href="?page=goal&gid=<?php echo $goal['gid']; ?>"><?php echo htmlspecialchars($goal['title']); ?></a></h3>
                </div>
            <?php endwhile; ?>
        </div>
        <h2>Recent Forum Posts</h2>
        <div id="forums">
            <?php while ($forum = $forums_result->fetch_assoc()): ?>
                <div class="forum-post">
                    <h3><a href="?page=forum&fid=<?php echo $forum['fid']; ?>"><?php echo htmlspecialchars($forum['title']); ?></a></h3>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="../assets/js/pages/profile.js?v=1"></script>
</body>
</html>
