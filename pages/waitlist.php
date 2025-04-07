<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = getCurrentUserId();
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $reason = trim($_POST['reason']);

    $stmt = $db->prepare("INSERT INTO wait_list (uid, username, email, reason, date) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param('isss', $uid, $username, $email, $reason);
    $stmt->execute();

    redirect('/?page=waitlist');
}

$query = "SELECT * FROM wait_list ORDER BY date DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Waitlist - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>Join Waitlist</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="reason" placeholder="Reason" required>
            <button type="submit">Join</button>
        </form>
        <h2>Current Waitlist</h2>
        <div id="waitlist">
            <?php while ($entry = $result->fetch_assoc()): ?>
                <div class="waitlist-entry">
                    <p><strong><?php echo htmlspecialchars($entry['username']); ?></strong> - <?php echo htmlspecialchars($entry['reason']); ?></p>
                    <p>Joined on <?php echo $entry['date']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
