document.addEventListener('DOMContentLoaded', () => {
    const commentForm = document.getElementById('comment-form');
    const commentsDiv = document.getElementById('comments');

    commentForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const gid = commentForm.getAttribute('data-gid');
        const comment = commentForm.querySelector('textarea').value;

        fetch('/api/add_goal_comment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `gid=${gid}&comment=${comment}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const commentDiv = document.createElement('div');
                commentDiv.className = 'comment';
                commentDiv.innerHTML = `
                    <p><strong>You</strong> on ${new Date().toLocaleString()}:</p>
                    <p>${comment}</p>
                `;
                commentsDiv.prepend(commentDiv);
                commentForm.reset();
            } else {
                alert(data.message);
            }
        });
    });

    document.querySelector('.like-btn').addEventListener('click', (e) => {
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
    });
});
