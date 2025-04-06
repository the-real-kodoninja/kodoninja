document.addEventListener('DOMContentLoaded', () => {
    const banners = document.querySelectorAll('.banner-image');
    let current = 0;
    setInterval(() => {
        banners[current].classList.remove('active');
        current = (current + 1) % banners.length;
        banners[current].classList.add('active');
    }, 5000);
});
