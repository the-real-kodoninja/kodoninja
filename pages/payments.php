<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

if (!isLoggedIn()) {
    redirect('/?page=login');
}

$uid = getCurrentUserId();

$query = "SELECT * FROM mem_pay WHERE uid = $uid ORDER BY date DESC";
$payments_result = $db->query($query);

$wallet_query = "SELECT * FROM user_wallet WHERE uid = $uid";
$wallet_result = $db->query($wallet_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payments - Kodoninja</title>
    <link rel="stylesheet" href="../assets/css/core.css?v=1">
</head>
<body>
    <div class="container">
        <h1>Payments</h1>
        <h2>Membership Payments</h2>
        <div id="payments">
            <?php while ($payment = $payments_result->fetch_assoc()): ?>
                <div class="payment">
                    <p>Type: <?php echo htmlspecialchars($payment['type']); ?></p>
                    <p>Amount: <?php echo htmlspecialchars($payment['amount']); ?></p>
                    <p>Date: <?php echo $payment['date']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <h2>Wallet</h2>
        <div id="wallet">
            <?php while ($wallet = $wallet_result->fetch_assoc()): ?>
                <div class="wallet-entry">
                    <p>Platform: <?php echo htmlspecialchars($wallet['platform']); ?></p>
                    <p>Wallet Number: <?php echo htmlspecialchars($wallet['w_num']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
