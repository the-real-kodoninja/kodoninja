<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$fid = isset($_GET['fid']) ? (int)$_GET['fid'] : 0;

if ($fid == 0) {
    die("Invalid forum ID");
}

$query = "SELECT f.*, u.username 
          FROM forum f 
          JOIN users u ON f.uid = u.id 
          WHERE f.fid = $fid AND f.remove = '0' AND f.hide = '0'";
$result = $db->query($query);
$forum = $result->fetch_assoc();

if (!$forum) {
    die("Forum not found");
}

$update_views = "UPDATE forum SET views = views + 1 WHERE fid = $fid";
$db->query($update_views);

$comments_query = "SELECT fc.*, u.username 
                  FROM forum_comments fc 
                  JOIN users u ON fc.uid = u.id 
                  WHERE fc.fid = $fid 
                  ORDER BY fc.date DESC";
$comments_result = $db->query($comments_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($forum['title']); ?> - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($forum['title']); ?></h1>
        <p>Posted by <?php echo htmlspecialchars($forum['username']); ?> on <?php echo $forum['date']; ?></p>
        <p>Views: <?php echo $forum['views']; ?></p>
        <div class="forum-content">
            <?php echo $forum['data']; ?>
        </div>
        <button class="like-btn" data-fid="<?php echo $forum['fid']; ?>">Like (<?php
            $upvote_query = "SELECT COUNT(*) as likes FROM forum_upvote WHERE fid = " . $forum['fid'];
            $upvote_result = $db->query($upvote_query);
            echo $upvote_result->fetch_assoc()['likes'];
        ?>)</button>
        <h3>Comments</h3>
        <div id="comments">
            <?php while ($comment = $comments_result->fetch_assoc()): ?>
                <div class="comment">
                    <p><strong><?php echo htmlspecialchars($comment['username']); ?></strong> on <?php echo $comment['date']; ?>:</p>
                    <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <form id="comment-form" data-fid="<?php echo $forum['fid']; ?>">
            <textarea name="comment" required></textarea>
            <button type="submit">Add Comment</button>
        </form>
    </div>
    <script src="../assets/js/pages/forum.js?v=1"></script>
</body>
</html>
