@extends('layouts.site')

@section('content')
    <style>
        :root {
            --body-bg: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            --msger-bg: #fff;
            --border: 2px solid #ddd;
            --left-msg-bg: #ececec;
            --right-msg-bg: #579ffb;
        }

        .msger-chat {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            height: 500px;
        }

        .msger-chat::-webkit-scrollbar {
            width: 6px;
        }

        .msger-chat::-webkit-scrollbar-track {
            background: #ddd;
        }

        .msger-chat::-webkit-scrollbar-thumb {
            background: #bdbdbd;
        }

        .msg {
            display: flex;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .msg:last-of-type {
            margin: 0;
        }

        .msg-bubble {
            max-width: 450px;
            padding: 15px;
            border-radius: 15px;
            background: var(--left-msg-bg);
        }

        .msg-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .msg-info-name {
            margin-right: 10px;
            font-weight: bold;
        }

        .msg-info-time {
            font-size: 0.85em;
        }

        .left-msg .msg-bubble {
            border-bottom-left-radius: 0;
        }

        .right-msg {
            flex-direction: row-reverse;
        }

        .right-msg .msg-bubble {
            background: var(--right-msg-bg);
            color: #fff;
            border-bottom-right-radius: 0;
        }
    </style>
    <div>
        <h1 class="text-center">Chat</h1>
        <div class="msger-chat"></div>
        <form class="d-flex justify-content-between" style="width: 80%; gap: 30px; position: fixed; bottom: 30px; ">
            <input type="text" id="messageInput" placeholder="Write here to your message!" class="form-control">
            <button id="sendMessageBtn" class="btn btn-success">Send</button>
        </form>
    </div>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const pusher = new Pusher('7b9089da1038cda52fbe', {
                cluster: 'ap2'
            });

            // Subscribe to the channel
            const channel = pusher.subscribe('my-channel');

            channel.bind('my-event', function(data) {
                const chatWindow = document.querySelector('.msger-chat');
                const messageId = 'message-' + Date.now();
                const messageHtml = `<div
            key=${messageId}
              class="msg ${data.username == "admin" ? "right-msg" : "left-msg"}">
              <div class="msg-bubble">
                <div class="msg-info">
                  <div class="msg-info-name">${data.username}</div>
                  <div class="msg-info-time">
                    ${data.date.substring(12)}
                  </div>
                </div>
                <div class="msg-text">${data.message}</div>
              </div>
            </div>`;
                chatWindow.innerHTML += messageHtml;

            });

            // Handle form submission
            const sendMessageBtn = document.getElementById('sendMessageBtn');
            const messageInput = document.getElementById('messageInput');

            sendMessageBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const message = messageInput.value;
                const currentDate = new Date().toLocaleString();
                // Send the message to the server using Fetch API
                fetch('/api/messages', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if needed
                        },
                        body: JSON.stringify({
                            username: 'admin',
                            message: message,
                            date: currentDate
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        messageInput.value = '';
                    })
                    .catch(error => {
                        console.error('Error sending message:', error);
                    });
            });
        });
    </script>
@endsection
