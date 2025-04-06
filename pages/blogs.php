<?php
declare(strict_types=1);
require_once 'includes/core.php';
require_once 'includes/db.php';

function render_blogs(): void {
    global $db;
    render_core_head('Blogs', [], [
        'assets/js/pages/blogs.js'
    ]);
    ?>
    <div data-page="blogs">
        <div class="container">
            <h1>Explore Blogs on kodoninja</h1>

            <!-- Most Viewed Blog -->
            <section class="most-viewed-blog">
                <h2>Most Viewed Blog</h2>
                <?php
                $mostViewed = $db->getMostViewedBlog();
                if ($mostViewed):
                ?>
                    <div class="blog-card featured" data-blog-id="<?php echo $mostViewed['id']; ?>">
                        <?php if ($mostViewed['image_path']): ?>
                            <div class="blog-image">
                                <img src="<?php echo htmlspecialchars($mostViewed['image_path']); ?>" alt="<?php echo htmlspecialchars($mostViewed['title']); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="blog-content">
                            <h3><?php echo htmlspecialchars($mostViewed['title']); ?></h3>
                            <p class="blog-meta">By <?php echo htmlspecialchars($mostViewed['author']); ?> | <?php echo number_format($mostViewed['views']); ?> Views | <?php echo date('M d, Y', strtotime($mostViewed['created_at'])); ?></p>
                            <p class="blog-excerpt"><?php echo htmlspecialchars($mostViewed['excerpt']); ?></p>
                            <a href="?page=blog&id=<?php echo $mostViewed['id']; ?>" class="read-more">Read More</a>
                            <div class="blog-actions">
                                <button class="like-btn">❤️ Like (<span class="like-count"><?php echo $db->getLikesCount($mostViewed['id']); ?></span>)</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Trending Blogs -->
            <section class="trending-blogs">
                <h2>Trending Blogs</h2>
                <div class="blog-grid">
                    <?php
                    $trendingBlogs = $db->getTrendingBlogs();
                    while ($blog = $trendingBlogs->fetchArray(SQLITE3_ASSOC)):
                    ?>
                        <div class="blog-card" data-blog-id="<?php echo $blog['id']; ?>">
                            <?php if ($blog['image_path']): ?>
                                <div class="blog-image">
                                    <img src="<?php echo htmlspecialchars($blog['image_path']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="blog-content">
                                <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                                <p class="blog-meta">By <?php echo htmlspecialchars($blog['author']); ?> | <?php echo number_format($blog['views']); ?> Views | <?php echo date('M d, Y', strtotime($blog['created_at'])); ?></p>
                                <p class="blog-excerpt"><?php echo htmlspecialchars($blog['excerpt']); ?></p>
                                <a href="?page=blog&id=<?php echo $blog['id']; ?>" class="read-more">Read More</a>
                                <div class="blog-actions">
                                    <button class="like-btn">❤️ Like (<span class="like-count"><?php echo $db->getLikesCount($blog['id']); ?></span>)</button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>

            <!-- All Blogs -->
            <section class="all-blogs">
                <h2>All Blogs</h2>
                <div class="blog-list" id="blog-list">
                    <?php
                    $allBlogs = $db->getAllBlogs();
                    while ($blog = $allBlogs->fetchArray(SQLITE3_ASSOC)):
                    ?>
                        <div class="blog-item" data-blog-id="<?php echo $blog['id']; ?>">
                            <div>
                                <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                                <p class="blog-meta">By <?php echo htmlspecialchars($blog['author']); ?> | <?php echo number_format($blog['views']); ?> Views | <?php echo date('M d, Y', strtotime($blog['created_at'])); ?></p>
                            </div>
                            <div class="blog-item-actions">
                                <button class="like-btn">❤️ Like (<span class="like-count"><?php echo $db->getLikesCount($blog['id']); ?></span>)</button>
                                <a href="?page=blog&id=<?php echo $blog['id']; ?>" class="read-more">Read More</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <button class="load-more" id="load-more">Load More</button>
            </section>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_blogs();
