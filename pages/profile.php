<?php
declare(strict_types=1);
require_once 'includes/core.php';
require_once 'includes/db.php';

function render_profile(): void {
    global $db;
    // Mock user data (replace with actual user data after authentication)
    $user = [
        'username' => 'kodoninja',
        'bio' => 'Self-help enthusiast | Ninja coder',
        'posts' => 42,
        'followers' => 128,
        'following' => 56
    ];

    render_core_head('Profile', [], [
        'assets/js/pages/profile.js'
    ]);
    ?>
    <div data-page="profile">
        <div class="container">
            <div class="profile-header">
                <img src="assets/images/profiles/kodoninja.jpg" alt="User" class="profile-pic">
                <h2><?php echo htmlspecialchars($user['username']); ?></h2>
                <p class="bio"><?php echo htmlspecialchars($user['bio']); ?></p>
                <button class="edit-bio-btn">Edit Bio</button>
                <form class="edit-bio-form" style="display: none;">
                    <textarea name="bio" placeholder="Update your bio..."><?php echo htmlspecialchars($user['bio']); ?></textarea>
                    <button type="submit">Save</button>
                </form>
            </div>
            <div class="profile-stats">
                <p>Posts: <?php echo $user['posts']; ?></p>
                <p>Followers: <?php echo $user['followers']; ?></p>
                <p>Following: <?php echo $user['following']; ?></p>
            </div>
            <div class="profile-content">
                <div class="profile-section">
                    <h3>My Blogs</h3>
                    <?php
                    $userBlogs = $db->getAllBlogs(0, 3); // Fetch user's blogs (mocked for now)
                    while ($blog = $userBlogs->fetchArray(SQLITE3_ASSOC)):
                        if ($blog['author'] === $user['username']):
                    ?>
                        <div class="profile-blog">
                            <h4><?php echo htmlspecialchars($blog['title']); ?></h4>
                            <p class="blog-meta"><?php echo date('M d, Y', strtotime($blog['created_at'])); ?></p>
                        </div>
                    <?php
                        endif;
                    endwhile;
                    ?>
                </div>
                <div class="profile-section">
                    <h3>My Goals</h3>
                    <!-- Mock goals (replace with actual data later) -->
                    <div class="goal">
                        <h4>Run a Marathon</h4>
                        <p>Progress: 50%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_profile();
