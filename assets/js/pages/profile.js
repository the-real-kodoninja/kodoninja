document.addEventListener('DOMContentLoaded', () => {
    // Prevent duplicate event listeners
    if (window.kodoninjaProfileInitialized) return;
    window.kodoninjaProfileInitialized = true;

    const editBioBtn = document.querySelector('.edit-bio-btn');
    const editBioForm = document.querySelector('.edit-bio-form');
    const bioDisplay = document.querySelector('.bio');

    if (editBioBtn && editBioForm && bioDisplay) {
        editBioBtn.addEventListener('click', () => {
            editBioForm.style.display = editBioForm.style.display === 'none' ? 'block' : 'none';
            editBioBtn.textContent = editBioForm.style.display === 'none' ? 'Edit Bio' : 'Cancel';
        });

        editBioForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const newBio = editBioForm.querySelector('textarea').value;
            // Mock API call (replace with actual API later)
            bioDisplay.textContent = newBio;
            editBioForm.style.display = 'none';
            editBioBtn.textContent = 'Edit Bio';
        });
    }
});
