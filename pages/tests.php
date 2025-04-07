<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

$page_title = 'Tests & Quizzes - Kodoninja';
include BASE_PATH . 'components/header.php';

$tests = $db->fetchAll("SELECT t.*, u.username FROM tests t JOIN users u ON t.uid = u.id WHERE t.remove = '0' AND t.approved = 'y' ORDER BY t.date DESC LIMIT 10");
?>

<section class="tests">
    <h1>Tests & Quizzes</h1>
    <?php if (isLoggedIn()): ?>
        <a href="/?page=tests&action=create" class="create-test-btn">Create a Test</a>
    <?php endif; ?>
    <div class="test-list">
        <?php foreach ($tests as $test): ?>
            <div class="test-card">
                <h3><a href="/?page=tests&tid=<?php echo $test['tid']; ?>"><?php echo sanitize($test['title']); ?></a></h3>
                <p><?php echo sanitize($test['description']); ?></p>
                <div class="test-meta">
                    <a href="/?page=profile&uid=<?php echo $test['uid']; ?>"><?php echo sanitize($test['username']); ?></a>
                    <span><?php echo formatDate($test['date']); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include BASE_PATH . 'components/footer.php'; ?>
