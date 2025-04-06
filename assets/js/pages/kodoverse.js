document.addEventListener('DOMContentLoaded', () => {
    const userCards = document.querySelectorAll('.user-card');
    const modal = document.getElementById('profile-modal');
    const modalUsername = document.getElementById('modal-username');
    const modalPhoto = document.getElementById('modal-profile-photo');
    const modalBio = document.getElementById('modal-bio');
    const modalPostCount = document.getElementById('modal-post-count');
    const closeModal = document.querySelector('.modal-close');

    const userData = {
        'kodoninja': {
            photo: 'assets/images/profiles/kodoninja.jpg',
            bio: 'A self-help ninja on a journey to mastery. #Growth',
            postCount: 42
        },
        'KodoSage': {
            photo: 'assets/images/profiles/kodo-sage.jpg',
            bio: 'Meditating my way to inner peace. #Mindfulness',
            postCount: 18
        }
    };

    userCards.forEach(card => {
        card.addEventListener('click', () => {
            const username = card.dataset.username;
            const data = userData[username];
            if (data) {
                modalUsername.textContent = username;
                modalPhoto.src = data.photo;
                modalBio.textContent = data.bio;
                modalPostCount.textContent = data.postCount;
                modal.style.display = 'flex';
            }
        });
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});
