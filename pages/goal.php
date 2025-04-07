<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$gid = isset($_GET['gid']) ? (int)$_GET['gid'] : 0;

if ($gid == 0) {
    die("Invalid goal ID");
}

$query = "SELECT g.*, u.username 
          FROM goal g 
          JOIN users u ON g.uid = u.id 
          WHERE g.gid = $gid AND g.remove = '0' AND g.hide = '0'";
$result = $db->query($query);
$goal = $result->fetch_assoc();

if (!$goal) {
    die("Goal not found");
}

$update_views = "UPDATE goal SET views = views + 1 WHERE gid = $gid";
$db->query($update_views);

$comments_query = "SELECT gc.*, u.username 
                  FROM goal_comments gc 
                  JOIN users u ON gc.uid = u.id 
                  WHERE gc.gid = $gid 
                  ORDER BY gc.date DESC";
$comments_result = $db->query($comments_query);

$updates_query = "SELECT gp.*, u.username 
                 FROM goal_post gp 
                 JOIN users u ON gp.uid = u.id 
                 WHERE gp.gid = $gid 
                 ORDER BY gp.date DESC";
$updates_result = $db->query($updates_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($goal['title']); ?> - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($goal['title']); ?></h1>
        <p>Posted by <?php echo htmlspecialchars($goal['username']); ?> on <?php echo $goal['date']; ?></p>
        <p>Views: <?php echo $goal['views']; ?></p>
        <div class="goal-content">
            <?php echo $goal['data']; ?>
        </div>
        <button class="like-btn" data-gid="<?php echo $goal['gid']; ?>">Like (<?php
            $upvote_query = "SELECT COUNT(*) as likes FROM goal_upvote WHERE gid = " . $goal['gid'];
            $upvote_result = $db->query($upvote_query);
            echo $upvote_result->fetch_assoc()['likes'];
        ?>)</button>
        <h3>Updates</h3>
        <div id="updates">
            <?php while ($update = $updates_result->fetch_assoc()): ?>
                <div class="update">
                    <p><strong><?php echo htmlspecialchars($update['username']); ?></strong> on <?php echo $update['date']; ?>:</p>
                    <p><?php echo htmlspecialchars($update['data']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <h3>Comments</h3>
        <div id="comments">
            <?php while ($comment = $comments_result->fetch_assoc()): ?>
                <div class="comment">
                    <p><strong><?php echo htmlspecialchars($comment['username']); ?></strong> on <?php echo $comment['date']; ?>:</p>
                    <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <form id="comment-form" data-gid="<?php echo $goal['gid']; ?>">
            <textarea name="comment" required></textarea>
            <button type="submit">Add Comment</button>
        </form>
    </div>
    <script src="../assets/js/pages/goal.js?v=1"></script>
</body>
</html>
