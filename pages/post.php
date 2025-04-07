<?php
require_once BASE_PATH . 'includes/core.php';
require_once BASE_PATH . 'includes/db.php';

if (!isLoggedIn()) {
    redirect('/?page=login');
}

$page_title = 'Create a Post - Kodoninja';
include BASE_PATH . 'components/header.php';

// Check if this is a contribution to an existing post
$contribute_to = isset($_GET['contribute_to']) ? (int)$_GET['contribute_to'] : null;
$contribute_type = isset($_GET['type']) ? $_GET['type'] : null;

if ($contribute_to && $contribute_type) {
    $table = $contribute_type === 'blog' ? 'blog' : ($contribute_type === 'forum' ? 'forum' : 'goal');
    $id_field = $contribute_type === 'blog' ? 'bid' : ($contribute_type === 'forum' ? 'fid' : 'gid');
    $content = $db->fetch("SELECT * FROM $table WHERE $id_field = ?", [$contribute_to]);
    if (!$content) {
        redirect('/?page=feed');
    }
}
?>

<section class="post-creation">
    <h1><?php echo $contribute_to ? 'Contribute to ' . ucfirst($contribute_type) : 'Create a Post'; ?></h1>
    <form id="post-form" action="/api/create_post.php" method="POST">
        <input type="hidden" name="contribute_to" value="<?php echo $contribute_to; ?>">
        <input type="hidden" name="contribute_type" value="<?php echo $contribute_type; ?>">
        <div class="post-type">
            <label for="post-type">Type:</label>
            <select id="post-type" name="type">
                <option value="post" <?php echo !$contribute_to ? '' : 'disabled'; ?>>Post</option>
                <option value="blog" <?php echo $contribute_type === 'blog' ? 'selected' : ''; ?>>Blog</option>
                <option value="forum" <?php echo $contribute_type === 'forum' ? 'selected' : ''; ?>>Forum</option>
                <option value="goal" <?php echo $contribute_type === 'goal' ? 'selected' : ''; ?>>Goal</option>
            </select>
        </div>
        <div class="post-actions">
            <button type="button" class="preview-btn">Preview</button>
            <button type="button" class="save-draft-btn">Save Draft</button>
            <button type="button" class="nimbus-btn">Nimbus.ai ✨</button>
        </div>
        <div class="wysiwyg-toolbar">
            <button type="button" class="wysiwyg-btn" data-command="bold">B</button>
            <button type="button" class="wysiwyg-btn" data-command="italic">I</button>
            <button type="button" class="wysiwyg-btn" data-command="underline">U</button>
            <button type="button" class="wysiwyg-btn">Text</button>
            <button type="button" class="wysiwyg-btn">Align</button>
            <button type="button" class="wysiwyg-btn">Lists</button>
            <button type="button" class="wysiwyg-btn">Media</button>
            <button type="button" class="wysiwyg-btn">😊</button>
            <button type="button" class="wysiwyg-btn">⋮</button>
        </div>
        <div class="wysiwyg-editor" contenteditable="true" id="post-editor">
            <?php if ($contribute_to): ?>
                <p>Contributing to: <?php echo sanitize($content['title']); ?></p>
            <?php else: ?>
                <p>Share your journey, goals, or insights...</p>
            <?php endif; ?>
        </div>
        <input type="hidden" name="content" id="post-content">
        <div class="nft-option">
            <label><input type="checkbox" name="mint_nft"> Mint as NFT (stored on Motoko)</label>
        </div>
        <button type="submit" class="submit-btn">Post Now</button>
    </form>
</section>

<?php include BASE_PATH . 'components/footer.php'; ?>
