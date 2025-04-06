<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_kodoverse(): void {
    render_core_head('Kodoverse', [], []);
    ?>
    <div data-page="kodoverse">
        <div class="container">
            <h1>Kodoverse</h1>
            <p>Explore the kodoninja universe.</p>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_kodoverse();
