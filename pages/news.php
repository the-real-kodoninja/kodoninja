<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$query = "SELECT * FROM news_list ORDER BY date DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>News</h1>
        <div id="news">
            <?php while ($news = $result->fetch_assoc()): ?>
                <div class="news-item">
                    <h2><?php echo htmlspecialchars($news['title']); ?></h2>
                    <p><?php echo $news['data']; ?></p>
                    <p>Posted on <?php echo $news['date']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
