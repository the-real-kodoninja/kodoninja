<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$page_title = 'Blogs - Kodoninja';
include BASE_PATH . 'components/header.php';

$blogs = $db->fetchAll("SELECT b.*, u.username FROM blog b JOIN users u ON b.uid = u.id WHERE b.remove = '0' AND b.hide = '0' ORDER BY b.date DESC LIMIT 10");
?>

<section class="blogs">
    <h1>Blogs</h1>
    <?php if (isLoggedIn()): ?>
        <a href="/?page=post&type=blog" class="create-blog-btn">Create a Blog</a>
    <?php endif; ?>
    <div class="blog-list">
        <?php foreach ($blogs as $blog): ?>
            <div class="blog-card">
                <div class="blog-header">
                    <img src="/assets/images/profiles/<?php echo $blog['username']; ?>.jpg" alt="Avatar" class="blog-avatar" onerror="this.src='/assets/images/default-avatar.png'">
                    <div class="blog-meta">
                        <a href="/?page=profile&uid=<?php echo $blog['uid']; ?>" class="username"><?php echo sanitize($blog['username']); ?></a>
                        <span class="blog-time"><?php echo formatDate($blog['date']); ?></span>
                    </div>
                    <div class="blog-settings">
                        <button class="settings-btn">⋮</button>
                        <div class="settings-dropdown">
                            <a href="/api/hide_post.php?id=<?php echo $blog['bid']; ?>&type=blog">Hide</a>
                            <a href="/api/save_post.php?id=<?php echo $blog['bid']; ?>&type=blog">Save</a>
                            <a href="/?page=lists&action=add&id=<?php echo $blog['bid']; ?>&type=blog">Add to List</a>
                            <a href="/api/send_post.php?id=<?php echo $blog['bid']; ?>&type=blog">Send</a>
                            <?php if ($blog['uid'] == getCurrentUser()['id']): ?>
                                <a href="/api/delete_post.php?id=<?php echo $blog['bid']; ?>&type=blog">Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="blog-body">
                    <h3><a href="/?page=blog&bid=<?php echo $blog['bid']; ?>"><?php echo sanitize($blog['title']); ?></a></h3>
                    <p><?php echo highlightMentions(sanitize(substr($blog['data'], 0, 150))); ?>...</p>
                    <?php if ($blog['nft_id']): ?>
                        <span class="nft-badge">NFT</span>
                    <?php endif; ?>
                </div>
                <div class="blog-footer">
                    <button class="like-btn" data-id="<?php echo $blog['bid']; ?>" data-type="blog"><?php echo $blog['v_count']; ?> Likes</button>
                    <button class="comment-btn">Comments</button>
                    <button class="share-btn">Share</button>
                    <button class="contribute-btn">Contribute</button>
                    <div class="comment-area" style="display: none;">
                        <img src="/assets/images/default-avatar.png" alt="Avatar" class="comment-avatar">
                        <textarea placeholder="Add a comment..."></textarea>
                        <button class="comment-add-btn">+</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include BASE_PATH . 'components/footer.php'; ?>
