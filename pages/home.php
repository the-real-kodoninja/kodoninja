<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_home(): void {
    render_core_head('Home', [], []);
    ?>
    <div data-page="home">
        <div class="container">
            <h1>Welcome to kodoninja</h1>
            <p>Your self-help social platform to share goals, blogs, and insights.</p>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_home();
