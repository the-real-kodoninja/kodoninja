document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('financial-calc-form');
    const results = document.getElementById('calc-results');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                results.innerHTML = `<p>Result: $${data.result}</p>`;
            } else {
                results.innerHTML = '<p>Error calculating. Please try again.</p>';
            }
        });
    });
});
