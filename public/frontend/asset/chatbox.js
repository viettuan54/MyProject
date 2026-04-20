// Chatbox JS - Porsche Style

document.addEventListener('DOMContentLoaded', function () {
    const chatboxContainer = document.getElementById('chatbox-container');
    const chatboxMessages = document.getElementById('chatbox-messages');
    const chatboxInput = document.getElementById('chatbox-input');
    const chatboxSend = document.getElementById('chatbox-send');
    const chatboxToggle = document.getElementById('chatbox-toggle');
    const chatboxClose = document.getElementById('chatbox-close');
    const suggestionsContainer = document.getElementById('chatbox-suggestions');

    let isOpen = false;
    let hasShownWelcome = false;
    let isSending = false;

    // Quick suggestions
    const suggestions = [
        'Bảng giá xe',
        'Showroom',
        'Lái thử',
        'Bảo hành'
    ];

    // Mở/đóng chatbox
    function toggleChatbox() {
        isOpen = !isOpen;
        if (isOpen) {
            chatboxContainer.style.display = 'block';
            chatboxToggle.innerHTML = '<i class="ri-close-line"></i>';
            setTimeout(() => {
                chatboxInput.focus();
                if (!hasShownWelcome) {
                    showWelcomeMessage();
                    hasShownWelcome = true;
                }
            }, 100);
        } else {
            chatboxContainer.style.display = 'none';
            chatboxToggle.innerHTML = '<i class="ri-chat-3-line"></i>';
        }
    }

    // Nút toggle
    if (chatboxToggle) {
        chatboxToggle.addEventListener('click', toggleChatbox);
    }

    // Nút hỗ trợ trên header
    const supportBtn = document.querySelector('.chatbox-trigger');
    if (supportBtn) {
        supportBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (!isOpen) {
                toggleChatbox();
            }
        });
    }

    // Nút đóng
    if (chatboxClose) {
        chatboxClose.addEventListener('click', toggleChatbox);
    }

    // Hiển thị welcome message
    function showWelcomeMessage() {
        const welcomeMsg = 'Xin chào! Tôi là trợ lý ảo của Porsche Việt Nam. Rất vui được hỗ trợ bạn!\n\nBạn có thể hỏi tôi về:\n• Các dòng xe Porsche\n• Giá xe và khuyến mãi\n• Showroom & lái thử\n• Bảo hành & bảo dưỡng';
        appendMessage(welcomeMsg, 'bot');
        renderSuggestions();
    }

    // Render suggestions
    function renderSuggestions() {
        if (suggestionsContainer) {
            suggestionsContainer.innerHTML = '';
            suggestions.forEach(text => {
                const btn = document.createElement('button');
                btn.className = 'chatbox-suggestion';
                btn.textContent = text;
                btn.addEventListener('click', () => {
                    chatboxInput.value = text;
                    sendMessage();
                });
                suggestionsContainer.appendChild(btn);
            });
        }
    }

    // Thêm tin nhắn
    function appendMessage(text, sender) {
        const msg = document.createElement('div');
        msg.className = 'chatbox-message ' + sender;
        msg.textContent = text;
        chatboxMessages.appendChild(msg);
        scrollToBottom();
    }

    // Hiển thị typing indicator
    function showTyping() {
        const typing = document.createElement('div');
        typing.className = 'chatbox-typing';
        typing.id = 'typing-indicator';
        typing.innerHTML = '<span></span><span></span><span></span>';
        chatboxMessages.appendChild(typing);
        scrollToBottom();
    }

    // Ẩn typing indicator
    function hideTyping() {
        const typing = document.getElementById('typing-indicator');
        if (typing) {
            typing.remove();
        }
    }

    // Scroll xuống cuối
    function scrollToBottom() {
        chatboxMessages.scrollTop = chatboxMessages.scrollHeight;
    }

    // Gửi tin nhắn
    function sendMessage() {
        if (isSending) return;

        const question = chatboxInput.value.trim();
        if (!question) return;

        isSending = true;
        if (chatboxSend) chatboxSend.disabled = true;
        if (chatboxInput) chatboxInput.disabled = true;

        // Hiển thị tin nhắn user
        appendMessage(question, 'user');
        chatboxInput.value = '';

        // Hiển thị typing
        showTyping();

        // Get CSRF token from meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        // Gửi request
        fetch('/api/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                ...(csrfToken && { 'X-CSRF-TOKEN': csrfToken })
            },
            body: JSON.stringify({ question })
        })
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP error! status: ${res.status}`);
                }
                return res.json();
            })
            .then(data => {
                if (!data.answer) {
                    throw new Error('Invalid response format');
                }
                // Delay để tạo cảm giác tự nhiên
                setTimeout(() => {
                    hideTyping();
                    appendMessage(data.answer, 'bot');
                    isSending = false;
                    if (chatboxSend) chatboxSend.disabled = false;
                    if (chatboxInput) {
                        chatboxInput.disabled = false;
                        chatboxInput.focus();
                    }
                }, 600 + Math.random() * 400);
            })
            .catch((error) => {
                console.error('Chatbot error:', error);
                setTimeout(() => {
                    hideTyping();
                    appendMessage('Xin lỗi, tôi gặp sự cố kết nối. Vui lòng thử lại sau ít giây hoặc liên hệ:\n\n📞 028 3911 9111 (TP.HCM)\n📞 024 3795 9111 (Hà Nội)', 'bot');
                    isSending = false;
                    if (chatboxSend) chatboxSend.disabled = false;
                    if (chatboxInput) {
                        chatboxInput.disabled = false;
                        chatboxInput.focus();
                    }
                }, 500);
            });
    }

    // Event listeners
    if (chatboxSend) {
        chatboxSend.addEventListener('click', sendMessage);
    }

    if (chatboxInput) {
        chatboxInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
    }

    // Click outside to close (optional)
    document.addEventListener('click', function (e) {
        if (isOpen &&
            !chatboxContainer.contains(e.target) &&
            !chatboxToggle.contains(e.target) &&
            (!supportBtn || !supportBtn.contains(e.target))) {
            // Uncomment to enable click outside close
            // toggleChatbox();
        }
    });

    // Keyboard shortcut (Escape to close)
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen) {
            toggleChatbox();
        }
    });
});
