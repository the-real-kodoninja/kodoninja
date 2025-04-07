<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$bid = isset($_GET['bid']) ? (int)$_GET['bid'] : 0;

if ($bid == 0) {
    die("Invalid blog ID");
}

// Fetch blog
$query = "SELECT b.*, u.username 
          FROM blog b 
          JOIN users u ON b.uid = u.id 
          WHERE b.bid = $bid AND b.approved = 'y' AND b.remove = '0' AND b.hide = '0'";
$result = $db->query($query);
$blog = $result->fetch_assoc();

if (!$blog) {
    die("Blog not found");
}

// Increment views
$update_views = "UPDATE blog SET views = views + 1 WHERE bid = $bid";
$db->query($update_views);

// Fetch comments
$comments_query = "SELECT bc.*, u.username 
                  FROM blog_comments bc 
                  JOIN users u ON bc.uid = u.id 
                  WHERE bc.bid = $bid 
                  ORDER BY bc.date DESC";
$comments_result = $db->query($comments_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($blog['title']); ?> - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($blog['title']); ?></h1>
        <p>Posted by <?php echo htmlspecialchars($blog['username']); ?> on <?php echo $blog['date']; ?></p>
        <p>Views: <?php echo $blog['views']; ?></p>
        <div class="blog-content">
            <?php echo $blog['data']; ?>
        </div>
        <button class="like-btn" data-bid="<?php echo $blog['bid']; ?>">Like (<?php
            $upvote_query = "SELECT COUNT(*) as likes FROM blog_upvote WHERE bid = " . $blog['bid'];
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
        <form id="comment-form" data-bid="<?php echo $blog['bid']; ?>">
            <textarea name="comment" required></textarea>
            <button type="submit">Add Comment</button>
        </form>
    </div>
    <script src="../assets/js/pages/blog.js?v=1"></script>
</body>
</html>
