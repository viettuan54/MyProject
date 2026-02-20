// Chatbox JS

document.addEventListener('DOMContentLoaded', function () {

    const chatboxContainer = document.getElementById('chatbox-container');
    const chatboxMessages = document.getElementById('chatbox-messages');
    const chatboxInput = document.getElementById('chatbox-input');
    const chatboxSend = document.getElementById('chatbox-send');

    // Tìm phần hỗ trợ trên header
    const supportBtn = document.querySelector('.header-text');
    if (supportBtn) {
        supportBtn.style.cursor = 'pointer';
        supportBtn.addEventListener('click', function () {
            if (chatboxContainer.style.display === 'none' || chatboxContainer.style.display === '') {
                chatboxContainer.style.display = 'block';
                setTimeout(() => {
                    chatboxInput.focus();
                }, 200);
            } else {
                chatboxContainer.style.display = 'none';
            }
        });
    }

    // Nút đóng chatbox
    const closeBtn = document.getElementById('chatbox-close');
    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            chatboxContainer.style.display = 'none';
        });
    }

    function appendMessage(text, sender) {
        const msg = document.createElement('div');
        msg.className = 'chatbox-message ' + sender;
        msg.textContent = text;
        chatboxMessages.appendChild(msg);
        chatboxMessages.scrollTop = chatboxMessages.scrollHeight;
    }

    function sendMessage() {
        const question = chatboxInput.value.trim();
        if (!question) return;
        appendMessage(question, 'user');
        chatboxInput.value = '';
        fetch('/api/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ question })
        })
        .then(res => res.json())
        .then(data => {
            appendMessage(data.answer, 'bot');
        })
        .catch(() => {
            appendMessage('Xin lỗi, có lỗi xảy ra. Vui lòng thử lại.', 'bot');
        });
    }

    chatboxSend.addEventListener('click', sendMessage);
    chatboxInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') sendMessage();
    });
});
