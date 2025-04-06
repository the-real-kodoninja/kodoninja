<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_logout(): void {
    // Simulate logout (we'll add proper session handling later)
    header('Location: ?page=home');
    exit;
}

render_logout();
