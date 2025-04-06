<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_goals(): void {
    render_core_head('Goals', [], []);
    ?>
    <div data-page="goals">
        <div class="container">
            <h1>Goals</h1>
            <p>Your personal goals to track and share.</p>
            <div class="goal">
                <h3>Run a Marathon</h3>
                <p>Progress: 50%</p>
            </div>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_goals();
