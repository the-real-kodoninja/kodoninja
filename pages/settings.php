<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_settings(): void {
    render_core_head('Settings', [], []);
    ?>
    <div data-page="settings">
        <div class="container">
            <h1>Settings</h1>
            <p>Manage your account settings.</p>
            <form>
                <label for="email">Email:</label>
                <input type="email" id="email" value="kodoninja@example.com">
                <button type="submit">Save</button>
            </form>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_settings();
