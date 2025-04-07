<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$limit = 10;
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$offset = ($page - 1) * $limit;

$query = "SELECT g.*, u.username 
          FROM goal g 
          JOIN users u ON g.uid = u.id 
          WHERE g.remove = '0' AND g.hide = '0' 
          ORDER BY g.date DESC 
          LIMIT $limit OFFSET $offset";
$result = $db->query($query);

$total_query = "SELECT COUNT(*) as total FROM goal WHERE remove = '0' AND hide = '0'";
$total_result = $db->query($total_query);
$total_goals = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_goals / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Goals - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>Goals</h1>
        <div id="goal-list">
            <?php while ($goal = $result->fetch_assoc()): ?>
                <div class="goal-post">
                    <h2><a href="?page=goal&gid=<?php echo $goal['gid']; ?>"><?php echo htmlspecialchars($goal['title']); ?></a></h2>
                    <p>Posted by <?php echo htmlspecialchars($goal['username']); ?> on <?php echo $goal['date']; ?></p>
                    <p>Views: <?php echo $goal['views']; ?></p>
                    <button class="like-btn" data-gid="<?php echo $goal['gid']; ?>">Like (<?php
                        $upvote_query = "SELECT COUNT(*) as likes FROM goal_upvote WHERE gid = " . $goal['gid'];
                        $upvote_result = $db->query($upvote_query);
                        echo $upvote_result->fetch_assoc()['likes'];
                    ?>)</button>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=goals&p=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
        <button id="load-more" data-offset="<?php echo $offset + $limit; ?>">Load More</button>
    </div>
    <script src="../assets/js/pages/goals.js?v=1"></script>
</body>
</html>
