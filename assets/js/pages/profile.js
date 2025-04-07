document.addEventListener('DOMContentLoaded', () => {
    const followBtn = document.getElementById('follow-btn');
    if (followBtn) {
        followBtn.addEventListener('click', () => {
            const uid = followBtn.getAttribute('data-uid');
            fetch('/api/follow_user.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `uid=${uid}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    followBtn.textContent = data.action === 'followed' ? 'Unfollow' : 'Follow';
                } else {
                    alert(data.message);
                }
            });
        });
    }
});
