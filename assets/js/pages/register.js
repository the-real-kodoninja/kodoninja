document.addEventListener('DOMContentLoaded', () => {
    const usernameInput = document.getElementById('username');
    const availabilityMessage = document.getElementById('username-availability');

    usernameInput.addEventListener('input', async () => {
        const username = usernameInput.value.trim();
        if (username.length < 3) {
            availabilityMessage.textContent = 'Username must be at least 3 characters long.';
            availabilityMessage.className = 'text-sm mt-1 text-red-500';
            return;
        }

        try {
            const response = await fetch(`/api/check_username.php?username=${encodeURIComponent(username)}`);
            const data = await response.json();

            availabilityMessage.textContent = data.message;
            availabilityMessage.className = `text-sm mt-1 ${data.available ? 'text-green-500' : 'text-red-500'}`;
        } catch (error) {
            availabilityMessage.textContent = 'Error checking username availability.';
            availabilityMessage.className = 'text-sm mt-1 text-red-500';
        }
    });
});
