// utils.js content
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('theme-toggle');
    const body = document.body;
    toggle.addEventListener('click', () => {
        body.dataset.theme = body.dataset.theme === 'dark' ? 'light' : 'dark';
        toggle.textContent = body.dataset.theme === 'dark' ? '🌙' : '☀️';
    });
});

// home.js content
document.addEventListener('DOMContentLoaded', () => {
    if (document.body.dataset.page === 'home') {
        const banners = document.querySelectorAll('.banner-image');
        let current = 0;
        setInterval(() => {
            banners[current].classList.remove('active');
            current = (current + 1) % banners.length;
            banners[current].classList.add('active');
        }, 5000);
    }
});

// feed.js content
document.addEventListener('DOMContentLoaded', () => {
    if (document.body.dataset.page === 'feed') {
        const feed = document.getElementById('posts-feed');
        const loading = document.getElementById('loading');
        let page = 1;

        function loadMorePosts() {
            loading.style.display = 'block';
            setTimeout(() => {
                const post = document.createElement('article');
                post.className = 'post';
                post.innerHTML = `
                    <div class="post-header">
                        <img src="assets/images/profiles/kodoninja.jpg" alt="Profile" class="profile-photo">
                        <div class="post-meta">
                            <span class="username">kodoninja</span>
                            <span class="timestamp">Just now</span>
                        </div>
                        <div class="post-actions">
                            <button class="action-btn">⋯</button>
                        </div>
                    </div>
                    <div class="post-body">
                        <p>Another step toward mastery! #Growth</p>
                    </div>
                    <div class="post-footer">
                        <button class="social-btn like-btn">0 Likes</button>
                        <button class="social-btn comment-btn">0 Comments</button>
                        <button class="social-btn share-btn">0 Shares</button>
                    </div>
                `;
                feed.appendChild(post);
                loading.style.display = 'none';
                page++;
            }, 1000);
        }

        window.addEventListener('scroll', () => {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200) {
                loadMorePosts();
            }
        });
    }
});
