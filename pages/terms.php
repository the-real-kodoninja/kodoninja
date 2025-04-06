<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_terms(): void {
    render_core_head('Terms of Service', [], []);
    ?>
    <div data-page="terms">
        <div class="container">
            <h1>Terms of Service</h1>
            <p>By using kodoninja, you agree to our terms.</p>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_terms();
