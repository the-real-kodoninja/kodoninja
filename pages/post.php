<?php
declare(strict_types=1);
require_once 'includes/core.php';

function render_post(): void {
    render_core_head('Create a Post', [], [
        'assets/js/pages/post.js'
    ]);
    ?>
    <div data-page="post">
        <div class="container">
            <h1>Create a Post</h1>
            <form action="submit_post.php" method="POST" enctype="multipart/form-data">
                <div class="post-type">
                    <label for="type">Type:</label>
                    <select name="type" id="type">
                        <option value="blog">Blog</option>
                        <option value="goal">Goal</option>
                        <option value="thought">Thought</option>
                    </select>
                </div>
                <div class="post-actions">
                    <button type="button" id="toggle-preview">Preview</button>
                    <button type="button" id="nimbus-ai-btn">Nimbus.ai ✨</button>
                </div>
                <div class="post-editor">
                    <div class="toolbar">
                        <button class="toolbar-btn" data-command="bold" title="Bold">B</button>
                        <button class="toolbar-btn" data-command="italic" title="Italic">I</button>
                        <button class="toolbar-btn" data-command="underline" title="Underline">U</button>
                        <div class="dropdown">
                            <button class="dropdown-toggle">Text</button>
                            <div class="dropdown-menu">
                                <button class="toolbar-btn" data-command="formatBlock:h1">H1</button>
                                <button class="toolbar-btn" data-command="formatBlock:h2">H2</button>
                                <button class="toolbar-btn" data-command="formatBlock:p">Paragraph</button>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle">Align</button>
                            <div class="dropdown-menu">
                                <button class="toolbar-btn" data-command="justifyLeft">Left</button>
                                <button class="toolbar-btn" data-command="justifyCenter">Center</button>
                                <button class="toolbar-btn" data-command="justifyRight">Right</button>
                                <button class="toolbar-btn" data-command="justifyFull">Justify</button>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle">Lists</button>
                            <div class="dropdown-menu">
                                <button class="toolbar-btn" data-command="insertUnorderedList">Bullet List</button>
                                <button class="toolbar-btn" data-command="insertOrderedList">Numbered List</button>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle">Media</button>
                            <div class="dropdown-menu">
                                <button class="toolbar-btn" data-command="createLink">Link</button>
                                <button class="toolbar-btn" data-command="insertImage">Image</button>
                                <button class="toolbar-btn" data-command="insertVideo">Video</button>
                            </div>
                        </div>
                        <button class="toolbar-btn" id="emoji-btn">😊</button>
                        <div class="emoji-picker" id="emoji-picker" style="display: none;">
                            <span class="emoji" data-emoji="😊">😊</span>
                            <span class="emoji" data-emoji="👍">👍</span>
                            <span class="emoji" data-emoji="❤️">❤️</span>
                            <span class="emoji" data-emoji="🚀">🚀</span>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle">⋮</button>
                            <div class="dropdown-menu">
                                <button id="save-draft">Save Draft</button>
                                <button id="edit-mode">Edit Mode</button>
                                <button id="contribute">Contribute</button>
                            </div>
                        </div>
                    </div>
                    <div id="editor-content">
                        <div contenteditable="true" id="editor" placeholder="Share your journey, goals, or insights...">
                            Share your journey, goals, or insights...
                        </div>
                    </div>
                    <div id="post-preview" style="display: none;">
                        <div class="preview-content"></div>
                    </div>
                    <input type="hidden" name="content" id="content">
                    <input type="file" id="image-upload" accept="image/*" style="display: none;">
                    <input type="file" id="video-upload" accept="video/*" style="display: none;">
                </div>
                <button type="submit" class="post-btn">Post Now</button>
            </form>
            <!-- Nimbus.ai Modal -->
            <div class="modal" id="nimbus-ai-modal" style="display: none;">
                <div class="modal-content">
                    <span class="modal-close">×</span>
                    <h3>Nimbus.ai</h3>
                    <div class="ai-options">
                        <button class="ai-option" data-action="suggest-title">Suggest a Title</button>
                        <button class="ai-option" data-action="expand-idea">Expand Idea</button>
                        <button class="ai-option" data-action="motivational-quote">Motivational Quote</button>
                    </div>
                    <div id="ai-output"></div>
                    <button id="ai-insert" style="display: none;">Insert</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    render_core_footer();
}

render_post();
