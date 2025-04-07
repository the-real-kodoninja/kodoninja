document.addEventListener('DOMContentLoaded', () => {
    const blogList = document.querySelector('.blog-list');

    // Show/Hide Comment Area and Contribute
    blogList.addEventListener('click', (e) => {
        if (e.target.classList.contains('comment-btn')) {
            const commentArea = e.target.nextElementSibling.nextElementSibling;
            commentArea.style.display = commentArea.style.display === 'none' ? 'flex' : 'none';
        } else if (e.target.classList.contains('contribute-btn')) {
            const blog = e.target.closest('.blog-card');
            const id = blog.querySelector('.like-btn').dataset.id;
            window.location.href = `/?page=post&contribute_to=${id}&type=blog`;
        } else if (e.target.classList.contains('comment-add-btn')) {
            const blog = e.target.closest('.blog-card');
            const id = blog.querySelector('.like-btn').dataset.id;
            const textarea = e.target.previousElementSibling;
            const comment = textarea.value.trim();
            if (comment) {
                fetch('/api/add_blog_comment.php', {
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
            fetch('/api/like_blog.php', {
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
