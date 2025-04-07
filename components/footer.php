</main>
<footer class="main-footer">
    <div class="footer-container">
        <p>© 2025 Kodoninja. All rights reserved.</p>
        <nav class="footer-nav">
            <a href="/?page=about">About</a>
            <a href="/?page=contact">Contact</a>
            <a href="/?page=marketplace">Marketplace</a>
        </nav>
    </div>
</footer>
<div class="chat-bubbles">
    <div class="nimbus-bubble" id="nimbus-bubble">☁️</div>
    <div class="messages-bubble" id="messages-bubble">💬</div>
    <div id="nimbus-chat-popup" class="nimbus-chat-popup hidden">
        <?php include BASE_PATH . 'components/nimbus-ai.php'; ?>
    </div>
    <!-- Add messages chat component here -->
</div>
<script src="/assets/js/nimbus-chat.js?v=1.3" defer></script>
</body>
</html>
