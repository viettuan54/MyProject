<!DOCTYPE html>
<html lang="vi">

<head>
    @include('User.parts.head')
    <link rel="stylesheet" href="{{ asset('frontend/asset/css/kenhtrotruyen.css') }}">
</head>

<body class="chat-channel-page">
    @include('User.parts.header')

    <main class="messenger-shell">
        <div class="messenger-layout">
            <aside class="panel-card panel-sidebar">
                <div class="sidebar-head">
                    <h1>Kênh trò chuyện</h1>
                    <p>Phòng chung để tất cả người dùng đã đăng nhập trò chuyện cùng nhau.</p>
                </div>

                <div class="sidebar-search">
                    <input type="text" id="member-search" placeholder="Tìm thành viên..." autocomplete="off">
                </div>

                <div class="room-chip">
                    <strong>Phòng chung:</strong> mọi tin nhắn đều hiển thị cho tất cả người dùng trong hệ thống.
                </div>

                <div class="contact-list" id="member-list">
                    @forelse($members as $member)
                        <div class="contact-item" data-member-name="{{ $member->name }}" data-member-email="{{ $member->email }}">
                            <span class="avatar-circle">
                                @if($member->avatar)
                                    <img src="{{ asset('storage/avatars/' . $member->avatar) }}" alt="{{ $member->name }}">
                                @else
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                @endif
                            </span>
                            <span class="contact-meta">
                            <span class="contact-name">{{ $member->name }}{{ (int) $member->id === (int) auth()->id() ? ' (Bạn)' : '' }}</span>
                                <span class="contact-sub">{{ $member->email }}</span>
                            </span>
                            @if((int) $member->id === (int) auth()->id())
                                <i class="ri-user-smile-line" style="color:#c1121f;font-size:18px;"></i>
                            @else
                                <i class="ri-discuss-line" style="color:#8a8a8a;font-size:18px;"></i>
                            @endif
                        </div>
                    @empty
                        <div style="padding:24px 18px;color:#666666;line-height:1.6;">
                            Chưa có thành viên nào trong hệ thống.
                        </div>
                    @endforelse
                </div>
            </aside>

            <section class="panel-card panel-chat">
                <div class="chat-head" id="chat-head">
                    <span class="avatar-circle" id="chat-avatar">G</span>
                    <div class="head-meta">
                        <h2 id="chat-contact-name">Phòng chat chung</h2>
                        <p id="chat-contact-email">Tất cả người dùng đã đăng nhập đều có thể xem và gửi tin nhắn.</p>
                    </div>
                    <span class="status-pill">Đang hoạt động</span>
                </div>

                @if(auth()->user()->role === 'admin')
                    <div class="chat-actions">
                        <button type="button" id="clear-all-btn" class="clear-all-btn">
                            <i class="ri-delete-bin-line"></i> Xóa tất cả tin nhắn
                        </button>
                    </div>
                @endif

                <div class="chat-meta-bar">
                    <span>Đang xem</span>
                    <strong id="chat-meta-name">Phòng chung</strong>
                </div>

                <div class="messages-area" id="messages-area" data-stream-url="{{ route('user.chat.stream') }}">
                    @forelse($messages as $message)
                        <div class="message-row {{ (int) $message->sender_id === (int) auth()->id() ? 'mine' : 'other' }}" data-message-id="{{ $message->id }}">
                            <div class="message-bubble">
                                <div class="message-sender">{{ $message->sender?->name ?? 'Người dùng' }}</div>
                                <div>{{ $message->body }}</div>
                                <div class="message-time">{{ $message->created_at ? $message->created_at->format('H:i d/m') : '' }}</div>
                                @if(auth()->user()->role === 'admin' || (int) $message->sender_id === (int) auth()->id())
                                    <div class="message-actions">
                                        <button type="button" class="message-delete-btn" data-message-id="{{ $message->id }}" title="Xóa tin nhắn">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="empty-state" id="empty-state">
                            <i class="ri-message-3-line"></i>
                            <h3>Chưa có tin nhắn nào</h3>
                            <p>Hãy gửi tin đầu tiên để bắt đầu cuộc trò chuyện chung.</p>
                        </div>
                    @endforelse
                </div>

                <div class="composer">
                    <div class="quick-actions" id="quick-actions">
                        <button type="button" data-text="Xin chào mọi người!">Chào mọi người</button>
                        <button type="button" data-text="Có ai đang online không?">Hỏi thăm</button>
                        <button type="button" data-text="Mình cần hỗ trợ một chút.">Nhờ hỗ trợ</button>
                    </div>

                    <div class="composer-form">
                        <textarea id="message-input" placeholder="Nhập tin nhắn cho tất cả mọi người..." autocomplete="off" spellcheck="false"></textarea>
                        <button type="button" id="send-message" aria-label="Gửi tin nhắn">
                            <i class="ri-send-plane-2-fill"></i>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @include('User.parts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const memberList = document.getElementById('member-list');
            const memberSearch = document.getElementById('member-search');
            const messagesArea = document.getElementById('messages-area');
            const messageInput = document.getElementById('message-input');
            const sendBtn = document.getElementById('send-message');
            const quickActions = document.getElementById('quick-actions');
            const chatMetaName = document.getElementById('chat-meta-name');
            const clearAllBtn = document.getElementById('clear-all-btn');

            if (!memberList || !messagesArea || !messageInput || !sendBtn) {
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            let currentStreamUrl = messagesArea.dataset.streamUrl || '';
            let lastMessageId = Array.from(messagesArea.querySelectorAll('[data-message-id]')).reduce(function (max, node) {
                return Math.max(max, Number(node.dataset.messageId || 0));
            }, 0);
            let pollTimer = null;
            let isSending = false;

            function resetComposerState(shouldClearValue) {
                isSending = false;
                sendBtn.disabled = false;
                messageInput.disabled = false;
                if (shouldClearValue !== false) {
                    messageInput.value = '';
                }
            }

            function scrollMessagesToBottom() {
                messagesArea.scrollTop = messagesArea.scrollHeight;
            }

            function getInitialLetter(name) {
                return (name || '?').trim().charAt(0).toUpperCase() || '?';
            }

            function renderMessage(message) {
                const row = document.createElement('div');
                row.className = 'message-row ' + (Number(message.sender_id) === Number(window.currentUserId) ? 'mine' : 'other');
                row.dataset.messageId = message.id;

                const bubble = document.createElement('div');
                bubble.className = 'message-bubble';
                const senderName = document.createElement('div');
                senderName.className = 'message-sender';
                senderName.textContent = message.sender?.name || 'Người dùng';

                const content = document.createElement('div');
                content.textContent = message.body;

                const time = document.createElement('div');
                time.className = 'message-time';
                time.textContent = message.created_at || '';

                bubble.appendChild(senderName);
                bubble.appendChild(content);
                bubble.appendChild(time);

                // Add delete button if user is admin or message owner
                if (window.isAdmin || Number(message.sender_id) === Number(window.currentUserId)) {
                    const actions = document.createElement('div');
                    actions.className = 'message-actions';
                    const deleteBtn = document.createElement('button');
                    deleteBtn.type = 'button';
                    deleteBtn.className = 'message-delete-btn';
                    deleteBtn.dataset.messageId = message.id;
                    deleteBtn.title = 'Xóa tin nhắn';
                    deleteBtn.innerHTML = '<i class="ri-delete-bin-line"></i>';
                    deleteBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        deleteMessage(message.id);
                    });
                    actions.appendChild(deleteBtn);
                    bubble.appendChild(actions);
                }

                row.appendChild(bubble);
                messagesArea.appendChild(row);
                lastMessageId = Math.max(lastMessageId, Number(message.id));
            }

            function clearMessages() {
                messagesArea.innerHTML = '';
            }

            function renderEmptyState(text, subtext) {
                messagesArea.innerHTML = '';
                const wrapper = document.createElement('div');
                wrapper.className = 'empty-state';
                wrapper.innerHTML = '<i class="ri-message-3-line"></i><h3>' + text + '</h3><p>' + subtext + '</p>';
                messagesArea.appendChild(wrapper);
            }

            function loadThread(scrollToBottom) {
                if (!currentStreamUrl) {
                    return;
                }

                const url = new URL(currentStreamUrl, window.location.origin);
                if (lastMessageId > 0) {
                    url.searchParams.set('after_id', String(lastMessageId));
                }

                return fetch(url.toString(), {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                    .then(function (res) {
                        if (!res.ok) {
                            throw new Error('HTTP ' + res.status);
                        }
                        return res.json();
                    })
                    .then(function (data) {
                        if (!data.messages) {
                            return;
                        }

                        if (messagesArea.querySelector('.empty-state')) {
                            clearMessages();
                        }

                        if (!data.messages.length && !messagesArea.querySelector('[data-message-id]')) {
                            renderEmptyState('Cuộc trò chuyện chưa có nội dung', 'Hãy gửi lời nhắn đầu tiên.');
                            return;
                        }

                        data.messages.forEach(function (message) {
                            renderMessage(message);
                        });

                        if (scrollToBottom !== false) {
                            scrollMessagesToBottom();
                        }
                    })
                    .catch(function () {
                        if (!messagesArea.querySelector('[data-message-id]')) {
                            renderEmptyState('Không thể tải cuộc trò chuyện', 'Vui lòng thử lại sau ít phút.');
                        }
                    });
            }

            function restartPolling() {
                if (pollTimer) {
                    clearInterval(pollTimer);
                }

                pollTimer = setInterval(function () {
                    loadThread(false);
                }, 3000);
            }

            function sendMessage() {
                if (isSending) {
                    return;
                }

                const body = messageInput.value.trim();
                if (!body) {
                    return;
                }

                isSending = true;
                sendBtn.disabled = true;
                messageInput.disabled = true;

                fetch('{{ route('user.chat.send') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                    },
                    body: JSON.stringify({
                        body: body
                    })
                })
                    .then(function (res) {
                        if (!res.ok) {
                            return res.json().then(function (payload) {
                                const error = new Error('HTTP ' + res.status);
                                error.payload = payload;
                                throw error;
                            });
                        }

                        return res.json();
                    })
                    .then(function (data) {
                        if (messagesArea.querySelector('.empty-state')) {
                            clearMessages();
                        }

                        if (data.message) {
                            renderMessage(data.message);
                            scrollMessagesToBottom();
                        }

                        messageInput.value = '';
                    })
                    .catch(function (error) {
                        console.error('Send message failed:', error);
                    })
                    .finally(function () {
                        isSending = false;
                        sendBtn.disabled = false;
                        messageInput.disabled = false;
                        messageInput.focus();
                    });
            }

            if (window.currentUserId === undefined) {
                window.currentUserId = Number(@json(auth()->id()));
            }

            if (window.isAdmin === undefined) {
                window.isAdmin = @json(auth()->user()->role === 'admin');
            }

            resetComposerState(true);

            // Trinh duyet co the khoi phuc trang tu bfcache va giu lai disabled/value cu.
            window.addEventListener('pageshow', function (event) {
                if (event.persisted) {
                    resetComposerState(true);
                }
            });

            function deleteMessage(messageId) {
                if (!confirm('Bạn chắc chắn muốn xóa tin nhắn này?')) {
                    return;
                }

                fetch('{{ route('user.chat.delete', '') }}/' + messageId, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                    }
                })
                    .then(function(res) {
                        if (!res.ok) {
                            throw new Error('HTTP ' + res.status);
                        }
                        return res.json();
                    })
                    .then(function(data) {
                        // Remove message from DOM
                        const messageRow = messagesArea.querySelector('[data-message-id="' + messageId + '"]');
                        if (messageRow) {
                            messageRow.remove();
                        }

                        // Show empty state if no messages left
                        if (!messagesArea.querySelector('[data-message-id]')) {
                            renderEmptyState('Cuộc trò chuyện chưa có nội dung', 'Hãy gửi lời nhắn đầu tiên.');
                        }
                    })
                    .catch(function(error) {
                        console.error('Delete message failed:', error);
                        alert('Không thể xóa tin nhắn. Vui lòng thử lại.');
                    });
            }

            if (memberSearch) {
                memberSearch.addEventListener('input', function () {
                    const filter = memberSearch.value.trim().toLowerCase();
                    document.querySelectorAll('.contact-item').forEach(function (item) {
                        const matches = item.dataset.memberName.toLowerCase().includes(filter) || item.dataset.memberEmail.toLowerCase().includes(filter);
                        item.style.display = matches ? 'flex' : 'none';
                    });
                });
            }

            if (quickActions) {
                quickActions.addEventListener('click', function (event) {
                    const button = event.target.closest('button[data-text]');
                    if (!button || messageInput.disabled) {
                        return;
                    }

                    const current = messageInput.value.trim();
                    const quickText = (button.dataset.text || '').trim();
                    messageInput.value = current ? current + ' ' + quickText : quickText;
                    messageInput.focus();
                    messageInput.setSelectionRange(messageInput.value.length, messageInput.value.length);
                });
            }

            if (clearAllBtn) {
                clearAllBtn.addEventListener('click', function() {
                    if (!confirm('Bạn chắc chắn muốn xóa TẤT CẢ tin nhắn trong phòng chat? Hành động này không thể hoàn tác!')) {
                        return;
                    }

                    fetch('{{ route('user.chat.deleteAll') }}', {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                        }
                    })
                        .then(function(res) {
                            if (!res.ok) {
                                throw new Error('HTTP ' + res.status);
                            }
                            return res.json();
                        })
                        .then(function(data) {
                            // Clear all messages from DOM
                            clearMessages();
                            renderEmptyState('Cuộc trò chuyện chưa có nội dung', 'Hãy gửi lời nhắn đầu tiên.');
                            lastMessageId = 0;
                        })
                        .catch(function(error) {
                            console.error('Clear all messages failed:', error);
                            alert('Không thể xóa tin nhắn. Vui lòng thử lại.');
                        });
                });
            }

            sendBtn.addEventListener('click', sendMessage);

            messageInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' && !event.shiftKey) {
                    event.preventDefault();
                    sendMessage();
                }
            });

            if (chatMetaName) {
                chatMetaName.textContent = 'Phòng chung';
            }

            scrollMessagesToBottom();

            // Thêm event listener cho delete buttons trên tin nhắn từ Blade template
            document.querySelectorAll('.message-delete-btn').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const messageId = this.dataset.messageId;
                    deleteMessage(messageId);
                });
            });

            // Nếu chưa có message nào, load từ API
            // Nếu đã có message từ Blade, chỉ polling cho message mới
            if (lastMessageId === 0) {
                loadThread(true).then(function() {
                    restartPolling();
                });
            } else {
                restartPolling();
            }

            window.addEventListener('beforeunload', function () {
                if (pollTimer) {
                    clearInterval(pollTimer);
                }
            });
        });
    </script>
</body>

</html>
