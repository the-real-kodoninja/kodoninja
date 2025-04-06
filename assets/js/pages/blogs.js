document.addEventListener('DOMContentLoaded', () => {
    // Prevent duplicate event listeners
    if (window.kodoninjaBlogsInitialized) return;
    window.kodoninjaBlogsInitialized = true;

    let offset = 4; // Initial offset (after the first 4 blogs)

    // Load More Blogs
    const loadMoreBtn = document.getElementById('load-more');
    const blogList = document.getElementById('blog-list');
    if (loadMoreBtn && blogList) {
        loadMoreBtn.addEventListener('click', () => {
            fetch(`api/load_more_blogs.php?offset=${offset}`)
                .then(response => response.json())
                .then(data => {
                    if (data.blogs.length === 0) {
                        loadMoreBtn.style.display = 'none';
                        return;
                    }

                    data.blogs.forEach(blog => {
                        const blogItem = document.createElement('div');
                        blogItem.className = 'blog-item';
                        blogItem.dataset.blogId = blog.id;
                        blogItem.innerHTML = `
                            <div>
                                <h3>${blog.title}</h3>
                                <p class="blog-meta">By ${blog.author} | ${parseInt(blog.views).toLocaleString()} Views | ${new Date(blog.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</p>
                            </div>
                            <div class="blog-item-actions">
                                <button class="like-btn">❤️ Like (<span class="like-count">${blog.likes}</span>)</button>
                                <a href="?page=blog&id=${blog.id}" class="read-more">Read More</a>
                            </div>
                        `;
                        blogList.appendChild(blogItem);
                    });

                    offset += data.blogs.length;

                    // Add event listeners to new like buttons
                    const newLikeButtons = blogList.querySelectorAll('.like-btn:not(.listener-added)');
                    newLikeButtons.forEach(button => {
                        button.classList.add('listener-added');
                        button.addEventListener('click', () => {
                            const blogId = button.closest('.blog-item').dataset.blogId;
                            const likeCountSpan = button.querySelector('.like-count');
                            fetch('api/like_blog.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ blog_id: blogId, user_id: 'kodoninja' }) // Replace 'kodoninja' with actual user ID after authentication
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        likeCountSpan.textContent = parseInt(likeCountSpan.textContent) + 1;
                                    }
                                });
                        });
                    });
                });
        });
    }

    // Like Buttons
    const likeButtons = document.querySelectorAll('.like-btn');
    likeButtons.forEach(button => {
        button.classList.add('listener-added');
        button.addEventListener('click', () => {
            const blogId = button.closest('.blog-card, .blog-item').dataset.blogId;
            const likeCountSpan = button.querySelector('.like-count');
            fetch('api/like_blog.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ blog_id: blogId, user_id: 'kodoninja' }) // Replace 'kodoninja' with actual user ID
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        likeCountSpan.textContent = parseInt(likeCountSpan.textContent) + 1;
                    }
                });
        });
    });
});
