document.addEventListener('DOMContentLoaded', () => {
    const commentForm = document.getElementById('comment-form');
    const commentsDiv = document.getElementById('comments');

    commentForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const bid = commentForm.getAttribute('data-bid');
        const comment = commentForm.querySelector('textarea').value;

        fetch('/api/add_comment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `bid=${bid}&comment=${comment}`
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
        const bid = e.target.getAttribute('data-bid');
        fetch('/api/like_blog.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `bid=${bid}`
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
