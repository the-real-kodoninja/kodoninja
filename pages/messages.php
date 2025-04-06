<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_messages(): void {
    render_core_head('Messages', [], []);
    ?>
    <div data-page="messages">
        <div class="container">
            <h1>Messages</h1>
            <p>Connect with the kodoninja community.</p>
            <div class="message">
                <p>NinjaMaster: Hey, loved your post!</p>
            </div>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_messages();
