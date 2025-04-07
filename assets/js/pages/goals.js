document.addEventListener('DOMContentLoaded', () => {
    const loadMoreBtn = document.getElementById('load-more');
    const goalList = document.getElementById('goal-list');

    loadMoreBtn.addEventListener('click', () => {
        const offset = loadMoreBtn.getAttribute('data-offset');
        fetch(`/api/load_more_goals.php?offset=${offset}`)
            .then(response => response.json())
            .then(goals => {
                goals.forEach(goal => {
                    const goalDiv = document.createElement('div');
                    goalDiv.className = 'goal-post';
                    goalDiv.innerHTML = `
                        <h2><a href="?page=goal&gid=${goal.gid}">${goal.title}</a></h2>
                        <p>Posted by ${goal.username} on ${goal.date}</p>
                        <p>Views: ${goal.views}</p>
                        <button class="like-btn" data-gid="${goal.gid}">Like (${goal.likes})</button>
                    `;
                    goalList.appendChild(goalDiv);
                });
                loadMoreBtn.setAttribute('data-offset', parseInt(offset) + goals.length);
                if (goals.length < 10) loadMoreBtn.style.display = 'none';
            });
    });

    goalList.addEventListener('click', (e) => {
        if (e.target.classList.contains('like-btn')) {
            const gid = e.target.getAttribute('data-gid');
            fetch('/api/like_goal.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `gid=${gid}`
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
