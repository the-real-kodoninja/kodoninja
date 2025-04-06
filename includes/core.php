<?php
declare(strict_types=1);

function render_core_head(string $title, array $extra_styles = [], array $extra_scripts = []): void {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>kodoninja - <?php echo htmlspecialchars($title); ?></title>
        <!-- Universal CSS -->
        <link rel="stylesheet" href="assets/css/core.css?v=1">
        <!-- Grammarly -->
        <script src="https://static.grammarly.com/js/grammarly-sdk.min.js"></script>
        <script>
            Grammarly.init({
                clientId: 'YOUR_GRAMMARLY_CLIENT_ID', // Replace with your Grammarly API key
                enable: true
            });
        </script>
    </head>
    <body data-theme="dark">
        <?php include 'components/header.php'; ?>
    <?php
}

function render_core_footer(array $extra_scripts = []): void {
    ?>
        <?php include 'components/footer.php'; ?>
        <!-- Universal JS -->
        <script src="assets/js/core.js?v=1"></script>
        <!-- Page-specific JS -->
        <?php foreach ($extra_scripts as $script): ?>
            <script src="<?php echo htmlspecialchars($script); ?>?v=1"></script>
        <?php endforeach; ?>
    </body>
    </html>
    <?php
}
