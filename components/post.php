<?php
declare(strict_types=1);

function render_post(array $post): void {
    ?>
    <article class="post" data-type="<?php echo htmlspecialchars($post['type']); ?>">
        <div class="post-header">
            <img src="<?php echo htmlspecialchars($post['profile_photo']); ?>" alt="Profile" class="profile-photo">
            <div class="post-meta">
                <span class="username"><?php echo htmlspecialchars($post['username']); ?></span>
                <span class="timestamp"><?php echo htmlspecialchars($post['timestamp']); ?></span>
            </div>
            <div class="post-actions">
                <button class="action-btn">⋯</button>
            </div>
        </div>
        <div class="post-body">
            <?php if ($post['image'] !== null): ?>
                <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image" class="post-image">
            <?php endif; ?>
            <p><?php echo htmlspecialchars($post['content']); ?></p>
            <?php if ($post['type'] === 'goal' && isset($post['progress'])): ?>
                <div class="progress-bar">
                    <div class="progress" style="width: <?php echo (int)$post['progress']; ?>%;"></div>
                </div>
            <?php endif; ?>
        </div>
        <div class="post-footer">
            <button class="social-btn like-btn"><?php echo (int)$post['likes']; ?> Likes</button>
            <button class="social-btn comment-btn"><?php echo (int)$post['comments']; ?> Comments</button>
            <button class="social-btn share-btn"><?php echo (int)$post['shares']; ?> Shares</button>
        </div>
    </article>
    <?php
}

render_post($post);
