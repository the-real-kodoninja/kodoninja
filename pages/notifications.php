<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

if (!isLoggedIn()) {
    redirect('/?page=login');
}

$uid = getCurrentUserId();
$query = "SELECT n.*, u.username 
          FROM notifications n 
          JOIN users u ON n.uid = u.id 
          WHERE n.rid = $uid 
          ORDER BY n.date DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>Notifications</h1>
        <div id="notifications">
            <?php while ($notification = $result->fetch_assoc()): ?>
                <div class="notification">
                    <p><strong><?php echo htmlspecialchars($notification['username']); ?></strong> <?php echo htmlspecialchars($notification['type']); ?> on <?php echo $notification['date']; ?></p>
                    <p><?php echo htmlspecialchars($notification['data']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
