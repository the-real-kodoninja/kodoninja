<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$page_title = 'Kodoninja - Unleash Your Inner Ninja';
include BASE_PATH . 'components/header.php';

// Fetch trending content
$trending_items = [];
$posts = $db->fetchAll("SELECT up.pid AS id, 'post' AS type, up.opid AS uid, up.title, up.data, up.postdate AS date, up.v_count, up.views, up.nft_id, u.username 
                        FROM user_post up 
                        JOIN users u ON up.opid = u.id 
                        WHERE up.remove = '0' AND up.hide = '0' 
                        ORDER BY up.v_count DESC LIMIT 5");
$blogs = $db->fetchAll("SELECT b.bid AS id, 'blog' AS type, b.uid, b.title, b.data, b.date, b.v_count, b.views, b.nft_id, u.username 
                        FROM blog b 
                        JOIN users u ON b.uid = u.id 
                        WHERE b.remove = '0' AND b.hide = '0' 
                        ORDER BY b.v_count DESC LIMIT 5");
$forums = $db->fetchAll("SELECT f.fid AS id, 'forum' AS type, f.uid, f.title, f.data, f.date, f.v_count, f.views, f.nft_id, u.username 
                         FROM forum f 
                         JOIN users u ON f.uid = u.id 
                         WHERE f.remove = '0' AND f.hide = '0' 
                         ORDER BY f.v_count DESC LIMIT 5");
$goals = $db->fetchAll("SELECT g.gid AS id, 'goal' AS type, g.uid, g.title, g.data, g.date, g.v_count, g.views, g.nft_id, u.username 
                        FROM goal g 
                        JOIN users u ON g.uid = u.id 
                        WHERE g.remove = '0' AND g.hide = '0' 
                        ORDER BY g.v_count DESC LIMIT 5");

$trending_items = array_merge($posts, $blogs, $forums, $goals);
usort($trending_items, function($a, $b) {
    return $b['v_count'] - $a['v_count'];
});
$trending_items = array_slice($trending_items, 0, 5);
?>

<section class="hero">
    <h1>Unleash Your Inner Ninja</h1>
    <p>Join the self-help social revolution—grow, connect, thrive.</p>
    <a href="/?page=register" class="cta-btn">Start Now</a>
</section>

<section class="trending">
    <h2>Trending Insights</h2>
    <div class="post-list">
        <?php foreach ($trending_items as $item): ?>
            <div class="post" data-id="<?php echo $item['id']; ?>" data-type="<?php echo $item['type']; ?>">
                <div class="post-header">
                    <img src="/assets/images/profiles/<?php echo $item['username']; ?>.jpg" alt="Avatar" class="post-avatar" onerror="this.src='/assets/images/default-avatar.png'">
                    <div class="post-meta">
                        <a href="/?page=profile&uid=<?php echo $item['uid']; ?>" class="username"><?php echo sanitize($item['username']); ?></a>
                        <span class="post-time"><?php echo formatDate($item['date']); ?></span>
                        <span class="post-type"><?php echo ucfirst($item['type']); ?></span>
                    </div>
                    <div class="post-settings">
                        <button class="settings-btn">⋮</button>
                        <div class="settings-dropdown">
                            <a href="/api/hide_post.php?id=<?php echo $item['id']; ?>&type=<?php echo $item['type']; ?>">Hide</a>
                            <a href="/api/save_post.php?id=<?php echo $item['id']; ?>&type=<?php echo $item['type']; ?>">Save</a>
                            <a href="/?page=lists&action=add&id=<?php echo $item['id']; ?>&type=<?php echo $item['type']; ?>">Add to List</a>
                            <a href="/api/send_post.php?id=<?php echo $item['id']; ?>&type=<?php echo $item['type']; ?>">Send</a>
                            <?php if ($item['uid'] == getCurrentUser()['id']): ?>
                                <a href="/api/delete_post.php?id=<?php echo $item['id']; ?>&type=<?php echo $item['type']; ?>">Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="post-body">
                    <h3><a href="/?page=<?php echo $item['type']; ?>&id=<?php echo $item['id']; ?>"><?php echo sanitize($item['title']); ?></a></h3>
                    <p><?php echo highlightMentions(sanitize($item['data'])); ?></p>
                    <?php if ($item['nft_id']): ?>
                        <span class="nft-badge">NFT</span>
                    <?php endif; ?>
                </div>
                <div class="post-footer">
                    <button class="like-btn" data-id="<?php echo $item['id']; ?>" data-type="<?php echo $item['type']; ?>"><?php echo $item['v_count']; ?> Likes</button>
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
