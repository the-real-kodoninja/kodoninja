document.addEventListener('DOMContentLoaded', () => {
    const feedPosts = document.getElementById('feed-posts');
    let page = 1;

    // Infinite Scroll
    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
            page++;
            fetch(`/api/load_more_posts.php?page=${page}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(item => {
                        const post = document.createElement('div');
                        post.className = 'post';
                        post.dataset.id = item.id;
                        post.dataset.type = item.type;
                        post.innerHTML = `
                            <div class="post-header">
                                <img src="/assets/images/profiles/${item.username}.jpg" alt="Avatar" class="post-avatar" onerror="this.src='/assets/images/default-avatar.png'">
                                <div class="post-meta">
                                    <a href="/?page=profile&uid=${item.uid}" class="username">${item.username}</a>
                                    <span class="post-time">${new Date(item.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</span>
                                    <span class="post-type">${item.type.charAt(0).toUpperCase() + item.type.slice(1)}</span>
                                </div>
                                <div class="post-settings">
                                    <button class="settings-btn">⋮</button>
                                    <div class="settings-dropdown">
                                        <a href="/api/hide_post.php?id=${item.id}&type=${item.type}">Hide</a>
                                        <a href="/api/save_post.php?id=${item.id}&type=${item.type}">Save</a>
                                        <a href="/?page=lists&action=add&id=${item.id}&type=${item.type}">Add to List</a>
                                        <a href="/api/send_post.php?id=${item.id}&type=${item.type}">Send</a>
                                        ${item.uid === <?php echo getCurrentUser()['id']; ?> ? `<a href="/api/delete_post.php?id=${item.id}&type=${item.type}">Delete</a>` : ''}
                                    </div>
                                </div>
                            </div>
                            <div class="post-body">
                                <h3><a href="/?page=${item.type}&id=${item.id}">${item.title}</a></h3>
                                <p>${item.data}</p>
                                ${item.nft_id ? '<span class="nft-badge">NFT</span>' : ''}
                            </div>
                            <div class="post-footer">
                                <button class="like-btn" data-id="${item.id}" data-type="${item.type}">${item.v_count} Likes</button>
                                <button class="comment-btn">Comments</button>
                                <button class="share-btn">Share</button>
                                <button class="contribute-btn">Contribute</button>
                                <div class="comment-area" style="display: none;">
                                    <img src="/assets/images/default-avatar.png" alt="Avatar" class="comment-avatar">
                                    <textarea placeholder="Add a comment..."></textarea>
                                    <button class="comment-add-btn">+</button>
                                </div>
                            </div>
                        `;
                        feedPosts.appendChild(post);
                    });
                });
        }
    });

    // New Posts Indicator
    const newPostsIndicator = document.getElementById('new-posts-indicator');
    const newPostsCount = document.getElementById('new-posts-count');
    let newPosts = 0;

    setInterval(() => {
        fetch('/api/check_new_posts.php')
            .then(response => response.json())
            .then(data => {
                newPosts = data.count;
                if (newPosts > 0) {
                    newPostsCount.textContent = newPosts;
                    newPostsIndicator.style.display = 'block';
                }
            });
    }, 30000);

    newPostsIndicator.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        newPosts = 0;
        newPostsIndicator.style.display = 'none';
        location.reload();
    });

    // Show/Hide Comment Area and Contribute
    feedPosts.addEventListener('click', (e) => {
        if (e.target.classList.contains('comment-btn')) {
            const commentArea = e.target.nextElementSibling.nextElementSibling;
            commentArea.style.display = commentArea.style.display === 'none' ? 'flex' : 'none';
        } else if (e.target.classList.contains('contribute-btn')) {
            const post = e.target.closest('.post');
            const id = post.dataset.id;
            const type = post.dataset.type;
            window.location.href = `/?page=post&contribute_to=${id}&type=${type}`;
        } else if (e.target.classList.contains('comment-add-btn')) {
            const post = e.target.closest('.post');
            const id = post.dataset.id;
            const type = post.dataset.type;
            const textarea = e.target.previousElementSibling;
            const comment = textarea.value.trim();
            if (comment) {
                fetch(`/api/add_${type}_comment.php`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id, comment })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        textarea.value = '';
                        alert('Comment added!');
                    }
                });
            }
        } else if (e.target.classList.contains('like-btn')) {
            const id = e.target.dataset.id;
            const type = e.target.dataset.type;
            fetch(`/api/like_${type}.php`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    e.target.textContent = `${data.v_count} Likes`;
                }
            });
        }
    });
});
