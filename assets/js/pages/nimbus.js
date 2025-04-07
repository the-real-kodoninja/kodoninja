document.addEventListener('DOMContentLoaded', () => {
    const messages = document.getElementById('nimbus-messages');
    const input = document.getElementById('nimbus-input');
    const sendBtn = document.getElementById('nimbus-send');

    sendBtn.addEventListener('click', () => {
        const message = input.value.trim();
        if (message) {
            const userMessage = document.createElement('div');
            userMessage.textContent = `You: ${message}`;
            messages.appendChild(userMessage);

            // Simulate Nimbus.ai response (replace with real API call)
            setTimeout(() => {
                const botMessage = document.createElement('div');
                botMessage.textContent = `Nimbus.ai: I can help with that! What do you want to know about ${message}?`;
                messages.appendChild(botMessage);
                messages.scrollTop = messages.scrollHeight;
            }, 1000);

            input.value = '';
        }
    });
});
