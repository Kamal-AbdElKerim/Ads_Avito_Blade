@if (session('success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500 // Close alert after 1.5 seconds
            });
        });
    </script>
@endif

<div class="col-lg-9 col-md-8 col-12">
    <div class="main-content">
        <div class="dashboard-block mt-0 pb-0">
            <h3 class="block-title mb-0">Messages</h3>
            <!-- Start Messages Body -->
            <div class="messages-body">
                <div class="form-head">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-12">
                            <h3 class="username-title p-5 text-center ">All Message</h3>
                        </div>
                        <div class="col-lg-7 col-12 align-right">
                            <h3 class="username-title" id="name_user">Carlos Dobson</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <!-- Start User List -->
                        <div class="user-list">
                            <ul id="userMessagesList">



                            </ul>
                        </div>
                        <!-- End User List -->
                    </div>
                    <div class="col-lg-7 col-12">
                        <!-- Start Chat List -->
                        <div class="chat-list">
                            <div id="info_ads">

                            </div>
                            <ul id="chat_messages" class="single-chat-head">

                                <div class="container mt-5">
                                    <div class="chat-container">
                                        <div class="chat-message">
                                            <p class="message">Welcome to ChatAds! How can we assist you today?</p>
                                        </div>
                                        <!-- More chat messages can be added here -->
                                    </div>
                                </div>
                            </ul>
                            <form action="javascript:void(0)">
                                <div class="reply-block">
                                    <ul class="add-media-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-link"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-image"></i></a></li>
                                    </ul>


                                    <input id="user_id" type="hidden">
                                    <input id="message" type="text" placeholder="Type your message here...">
                                    <button onclick="add_message()" class="reply-btn"><img
                                            src="{{ asset('frontend/assets/images/messages/send.svg') }}"
                                            alt="#"></button>
                                </div>
                            </form>
                        </div>

                        <!-- End Chat List -->
                    </div>
                </div>
            </div>
            <!-- End Messages Body -->
        </div>
    </div>
</div>


@section('script')
    <script>
        function timeAgo(timestamp) {
            const now = new Date();
            const messageTime = new Date(timestamp);
            const diff = Math.abs(now - messageTime);
            const minutes = Math.floor(diff / (1000 * 60));
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));

            if (days > 0) {
                return days === 1 ? '1 day ago' : `${days} days ago`;
            } else if (hours > 0) {
                return hours === 1 ? '1 hour ago' : `${hours} hours ago`;
            } else {
                return minutes <= 1 ? 'just now' : `${minutes} minutes ago`;
            }
        }

        function getmessege() {


            axios.get('/messages-list-json')
                .then(function(response) {
                    console.log('dataaaaa', response)
                    const users = response.data.users;

                    // Select the list element
                    const userList = document.getElementById('userMessagesList');

                    // Clear existing content if needed
                    userList.innerHTML = '';

                    // Loop through each user and append a list item

                    users.forEach(function(user) {
                        const listItem = document.createElement('li');

                        // if (user.user1.id === {{ Auth()->id() }}) {

                        //     continue

                        // }
                        const otherUser = user.user1.id !== {{ Auth()->id() }} ? user.user1 : user.user2;
                        const profileImageUrl = "{{ asset('images/') }}" + '/' + otherUser.image;


                        listItem.innerHTML = `
                <a class='user_hover' onclick="messageUser(${otherUser.id}, '${otherUser.name}','${profileImageUrl}','${user.ads.Title}','${user.ads.Price}','${user.ads.id}')" href="javascript:void(0)"  data-user-id="${otherUser.id}">

                    <div class="image">
                        <img src="${profileImageUrl}" alt="Profile Image">
                        </div>
                        <span class="username">${otherUser.name}</span>
                        <span class="short-message">${timeAgo(user.created_at)}</span>
                        <span class="unseen-message">${user.ads.Title}</span>
                    
                   
                </a>
                `;
                        userList.appendChild(listItem);

                    });
                })
                // .catch(function(error) {
                //     // handle error
                //     console.log(error);
                // })
                .finally(function() {
                    // always executed
                });

        }
        getmessege()


        var assetBaseUrl = '{{ asset('') }}';


        

        let messageInterval; // Variable to hold the interval reference

function messageUser(user_id, name_id, image_url, title_ads, Price_ads, ID_ads) {
    // Clear existing interval (if any)
    clearInterval(messageInterval);

    // Display ad and user information
    document.getElementById('info_ads').innerHTML = `
        <div class="row">            
            <h6 class="col-8">${Price_ads} MAD - <span>${title_ads}</span></h6>
        </div>
        <a class="btn btn_more mt-2" href="/SinglPage/${ID_ads}">More Details</a>
        <hr>
    `;

    // Display the user's name in the chat header
    document.getElementById('name_user').textContent = name_id;

    // Deselect all other user links in the conversation list
    const links = document.querySelectorAll('#userMessagesList a');
    links.forEach(link => {
        link.classList.remove('toggle_user');
    });

    // Select the clicked user link and apply a toggle class
    const clickedLink = document.querySelector(`#userMessagesList a[data-user-id="${user_id}"]`);
    if (clickedLink) {
        clickedLink.classList.add('toggle_user');
    }

    // Clear chat messages
    document.getElementById('chat_messages').innerHTML = '';

    // Set up a new interval to fetch and display messages periodically
    messageInterval = setInterval(async () => {
        await  axios.get('/user_message/' + user_id)
            .then(function(response) {
                console.log('messages:', response);
                document.getElementById('chat_messages').innerHTML = '';

                // Set the authenticated user ID
                document.getElementById('user_id').value = response.data.user_id;

                // Iterate over fetched messages and display them
                response.data.messages.forEach(function(message) {
                    var isCurrentUserMessage = (message.from_id == user_id);
                    var liClass = isCurrentUserMessage ? 'left ' : 'right';
                    var li = document.createElement('li');
                    li.className = liClass;

                    if (isCurrentUserMessage) {
                        var imgSrc = image_url;
                        var img = document.createElement('img');
                        img.src = imgSrc;
                        img.alt = '#';
                        li.appendChild(img);
                    }

                    var p = document.createElement('p');
                    p.className = isCurrentUserMessage ? 'text text-start' : 'text text-end';
                    p.textContent = message.message;

                    var span = document.createElement('span');
                    span.className = isCurrentUserMessage ? 'time text-start' : 'time text-end';
                    span.textContent = formatTime(message.created_at);

                    li.appendChild(p);
                    li.appendChild(span);
                    document.getElementById('chat_messages').appendChild(li);
                });
            })
            scrollToBottomOfChat()
            // .catch(function(error) {
            //     console.error('Error fetching messages:', error);
            // });
    }, 1000);
}


        function formatTime(timestamp) {
            return new Date(timestamp).toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });
        }

        function add_message() {
            let message = document.getElementById('message').value;
            let user_id = document.getElementById('user_id').value;

            axios.post('/add_Message', {
                    message: message,
                    user_id: user_id
                })
                .then(function(response) {
                    console.log('Message sent successfully:', response.data);

                    // Clear the input field after sending the message
                    document.getElementById('message').value = '';

                    // Append the new message to the chat interface
                    appendMessageToChat(response.data.chat_message);


                    // Optionally, scroll to the bottom of the chat messages
                    scrollToBottomOfChat();
                })
                // .catch(function(error) {
                //     console.error('Error sending message:', error);
                // });
        }

        function appendMessageToChat(message) {
            // Create a new <li> element for the message
            let li = document.createElement('li');

            // Determine the class based on the message sender (assuming current user's messages are displayed on the left)
            li.className = message.from_id === {{ Auth()->id() }} ? 'right' : 'left';

            // Construct the image source URL using template literals
            let imageUrl = `${assetBaseUrl}frontend/assets/images/messages/image${message.from_id}.jpg`;

            // Set the message content and timestamp inside the <li> element
            li.innerHTML = `
        <p class="text text-end ">${message.message}
            </p>
            <span class="time">${formatTime(message.created_at)}</span>
    `;

            // Append the new message <li> element to the chat messages list
            let chatMessages = document.getElementById('chat_messages');
            chatMessages.appendChild(li);

            // Optionally, scroll to the bottom of the chat messages after appending the new message
            scrollToBottomOfChat();
        }

        function formatTime(timestamp) {
            // Format timestamp as desired (e.g., HH:mm AM/PM)
            return new Date(timestamp).toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });
        }

        function scrollToBottomOfChat() {
            // Scroll to the bottom of the chat messages (adjust as needed)
            let chatMessages = document.getElementById('chat_messages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    </script>
@endsection
