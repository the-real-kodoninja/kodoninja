document.addEventListener('DOMContentLoaded', () => {
    const loadMoreBtn = document.getElementById('load-more');
    const forumList = document.getElementById('forum-list');

    loadMoreBtn.addEventListener('click', () => {
        const offset = loadMoreBtn.getAttribute('data-offset');
        fetch(`/api/load_more_forums.php?offset=${offset}`)
            .then(response => response.json())
            .then(forums => {
                forums.forEach(forum => {
                    const forumDiv = document.createElement('div');
                    forumDiv.className = 'forum-post';
                    forumDiv.innerHTML = `
                        <h2><a href="?page=forum&fid=${forum.fid}">${forum.title}</a></h2>
                        <p>Posted by ${forum.username} on ${forum.date}</p>
                        <p>Views: ${forum.views}</p>
                        <button class="like-btn" data-fid="${forum.fid}">Like (${forum.likes})</button>
                    `;
                    forumList.appendChild(forumDiv);
                });
                loadMoreBtn.setAttribute('data-offset', parseInt(offset) + forums.length);
                if (forums.length < 10) loadMoreBtn.style.display = 'none';
            });
    });

    forumList.addEventListener('click', (e) => {
        if (e.target.classList.contains('like-btn')) {
            const fid = e.target.getAttribute('data-fid');
            fetch('/api/like_forum.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `fid=${fid}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    e.target.textContent = `Like (${data.likes})`;
                } else {
                    alert(data.message);
                }
            });
        }
    });
});
