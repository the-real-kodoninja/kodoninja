document.addEventListener('DOMContentLoaded', () => {
    const commentForm = document.getElementById('comment-form');
    const commentsDiv = document.getElementById('comments');

    commentForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const fid = commentForm.getAttribute('data-fid');
        const comment = commentForm.querySelector('textarea').value;

        fetch('/api/add_forum_comment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `fid=${fid}&comment=${comment}`
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
    });
});
