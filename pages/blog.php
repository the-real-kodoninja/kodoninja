<?php
declare(strict_types=1);
require_once 'includes/core.php';
require_once 'includes/db.php';

function render_blog(): void {
    global $db;
    $blogId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $blog = $db->getBlogById($blogId);

    if (!$blog) {
        // Redirect to blogs page if blog not found
        header('Location: ?page=blogs');
        exit;
    }

    // Increment views
    $db->incrementBlogViews($blogId);

    render_core_head($blog['title'], [], [
        'assets/js/pages/blog.js'
    ]);
    ?>
    <div data-page="blog">
        <div class="container">
            <h1><?php echo htmlspecialchars($blog['title']); ?></h1>
            <p class="blog-meta">By <?php echo htmlspecialchars($blog['author']); ?> | <?php echo number_format($blog['views']); ?> Views | <?php echo date('M d, Y', strtotime($blog['created_at'])); ?></p>
            <?php if ($blog['image_path']): ?>
                <div class="blog-image">
                    <img src="<?php echo htmlspecialchars($blog['image_path']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                </div>
            <?php endif; ?>
            <div class="blog-content">
                <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
            </div>
            <div class="blog-actions">
                <button class="like-btn" data-blog-id="<?php echo $blog['id']; ?>">❤️ Like (<span class="like-count"><?php echo $db->getLikesCount($blog['id']); ?></span>)</button>
            </div>

            <!-- Comments Section -->
            <section class="comments-section">
                <h2>Comments</h2>
                <form class="comment-form" data-blog-id="<?php echo $blog['id']; ?>">
                    <textarea name="comment" placeholder="Add a comment..." required></textarea>
                    <button type="submit">Post Comment</button>
                </form>
                <div class="comments-list">
                    <?php
                    $comments = $db->getComments($blog['id']);
                    while ($comment = $comments->fetchArray(SQLITE3_ASSOC)):
                    ?>
                        <div class="comment">
                            <p class="comment-meta">By <?php echo htmlspecialchars($comment['user_id']); ?> | <?php echo date('M d, Y', strtotime($comment['created_at'])); ?></p>
                            <p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_blog();
