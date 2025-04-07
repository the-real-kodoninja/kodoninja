<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

if (!isLoggedIn()) {
    redirect('/?page=login');
}

$uid = getCurrentUserId();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $message = trim($_POST['message']);

    $stmt = $db->prepare("INSERT INTO case_log (uid, title, date) VALUES (?, ?, NOW())");
    $stmt->bind_param('is', $uid, $title);
    $stmt->execute();
    $case_id = $stmt->insert_id;

    $stmt = $db->prepare("INSERT INTO case_msg (cid, uid, message, date) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param('iis', $case_id, $uid, $message);
    $stmt->execute();

    redirect('/?page=support');
}

$query = "SELECT * FROM case_log WHERE uid = $uid ORDER BY date DESC";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>Support</h1>
        <form method="POST">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <button type="submit">Submit Case</button>
        </form>
        <h2>Your Cases</h2>
        <div id="cases">
            <?php while ($case = $result->fetch_assoc()): ?>
                <div class="case">
                    <h3><?php echo htmlspecialchars($case['title']); ?></h3>
                    <p>Created on <?php echo $case['date']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
