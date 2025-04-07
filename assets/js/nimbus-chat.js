document.addEventListener('DOMContentLoaded', () => {
    const nimbusBubble = document.getElementById('nimbus-bubble');
    const nimbusChatPopup = document.getElementById('nimbus-chat-popup');
    const nimbusSend = document.getElementById('nimbus-global-send');
    const nimbusInput = document.getElementById('nimbus-global-input');
    const nimbusMessages = document.getElementById('nimbus-global-messages');

    // Toggle chat popup
    nimbusBubble.addEventListener('click', () => {
        nimbusChatPopup.classList.toggle('hidden');
    });

    // Send message
    nimbusSend.addEventListener('click', sendMessage);
    nimbusInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    function sendMessage() {
        const message = nimbusInput.value.trim();
        if (!message) return;

        // Add user message to chat
        const userMessage = document.createElement('div');
        userMessage.classList.add('message', 'user-message');
        userMessage.textContent = message;
        nimbusMessages.appendChild(userMessage);

        // Clear input
        nimbusInput.value = '';

        // Scroll to bottom
        nimbusMessages.scrollTop = nimbusMessages.scrollHeight;

        // Send message to Nimbus AI backend
        fetchNimbusResponse(message);
    }

    function fetchNimbusResponse(message) {
        fetch('http://localhost:8001/api/nimbus', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                message: message,
                context: '' // Global chat, no specific context
            })
        })
        .then(response => response.json())
        .then(data => {
            const nimbusMessage = document.createElement('div');
            nimbusMessage.classList.add('message', 'nimbus-message');
            nimbusMessage.textContent = data.response;
            nimbusMessages.appendChild(nimbusMessage);
            nimbusMessages.scrollTop = nimbusMessages.scrollHeight;
        })
        .catch(error => {
            console.error('Error fetching Nimbus response:', error);
            const nimbusMessage = document.createElement('div');
            nimbusMessage.classList.add('message', 'nimbus-message');
            nimbusMessage.textContent = 'Nimbus.ai: Sorry, I encountered an error. Please try again later.';
            nimbusMessages.appendChild(nimbusMessage);
            nimbusMessages.scrollTop = nimbusMessages.scrollHeight;
        });
    }
});
