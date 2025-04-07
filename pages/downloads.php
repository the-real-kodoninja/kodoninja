<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$query = "SELECT d.*, dv.views 
          FROM downloads d 
          LEFT JOIN download_vwcount dv ON d.id = dv.did 
          ORDER BY d.date DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Downloads - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>Downloads</h1>
        <div id="downloads">
            <?php while ($download = $result->fetch_assoc()): ?>
                <div class="download">
                    <h2><?php echo htmlspecialchars($download['title']); ?></h2>
                    <p>Views: <?php echo $download['views'] ?? 0; ?></p>
                    <a href="<?php echo htmlspecialchars($download['link']); ?>" target="_blank">Download</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
