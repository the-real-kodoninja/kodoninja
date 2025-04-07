<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$page_title = 'Nimbus.ai - Kodoninja';
include BASE_PATH . 'components/header.php';
?>

<section class="nimbus-page">
    <h1>Nimbus.ai</h1>
    <p>Your personal AI assistant for all things Kodoninja.</p>
    <?php include BASE_PATH . 'components/nimbus-ai.php'; ?>
</section>

<?php include BASE_PATH . 'components/footer.php'; ?>
