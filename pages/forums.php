<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$limit = 10;
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$offset = ($page - 1) * $limit;

$query = "SELECT f.*, u.username 
          FROM forum f 
          JOIN users u ON f.uid = u.id 
          WHERE f.remove = '0' AND f.hide = '0' 
          ORDER BY f.date DESC 
          LIMIT $limit OFFSET $offset";
$result = $db->query($query);

$total_query = "SELECT COUNT(*) as total FROM forum WHERE remove = '0' AND hide = '0'";
$total_result = $db->query($total_query);
$total_forums = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_forums / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forums - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>Forums</h1>
        <div id="forum-list">
            <?php while ($forum = $result->fetch_assoc()): ?>
                <div class="forum-post">
                    <h2><a href="?page=forum&fid=<?php echo $forum['fid']; ?>"><?php echo htmlspecialchars($forum['title']); ?></a></h2>
                    <p>Posted by <?php echo htmlspecialchars($forum['username']); ?> on <?php echo $forum['date']; ?></p>
                    <p>Views: <?php echo $forum['views']; ?></p>
                    <button class="like-btn" data-fid="<?php echo $forum['fid']; ?>">Like (<?php
                        $upvote_query = "SELECT COUNT(*) as likes FROM forum_upvote WHERE fid = " . $forum['fid'];
                        $upvote_result = $db->query($upvote_query);
                        echo $upvote_result->fetch_assoc()['likes'];
                    ?>)</button>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=forums&p=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
        <button id="load-more" data-offset="<?php echo $offset + $limit; ?>">Load More</button>
    </div>
    <script src="../assets/js/pages/forums.js?v=1"></script>
</body>
</html>
