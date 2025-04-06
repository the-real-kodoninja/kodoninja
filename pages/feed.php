<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_feed(): void {
    render_core_head('Feed', [], []);
    ?>
    <div data-page="feed">
        <div class="container">
            <h1>Feed</h1>
            <p>Latest posts from the kodoninja community.</p>
            <div class="post">
                <h2>5 Mindfulness Tips</h2>
                <p>Posted by NinjaMaster</p>
            </div>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_feed();
