<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_privacy(): void {
    render_core_head('Privacy Policy', [], []);
    ?>
    <div data-page="privacy">
        <div class="container">
            <h1>Privacy Policy</h1>
            <p>We respect your privacy. Your data is safe with us.</p>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_privacy();
