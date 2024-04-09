@extends('frontend.layouts.app')


@section('title')
@endsection

@section('content')
    <div>
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Ad Details</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html">Home</a></li>
                            <li>Ad Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
        <div class="style_sms offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Messenger</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>


            <div class="offcanvas-body  ">
                <div class="messages-body  container_sms">
                    <div class="form-head">
                        <div class="row align-items-center ">
                            <div class="col-lg-5 col-12">
                                <form class="chat-search-form">
                                    {{-- <input class="input_s" type="text" placeholder="Search username" name="search">
                                --}}
                                    {{-- <button value="search" type="submit"><i class="lni lni-search-alt"></i></button>
                                --}}
                                </form>
                            </div>
                            <div class="col-lg-7 col-12 align-right">
                                <h3 class="username-title">{{ $ads->users->name }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-lg-5 col-12">
                        <!-- Start User List -->
                        <div class="user-list">
                            <ul>
                                <!-- Start Single List -->
                                <li>
                                    <a href="javascript:void(0)">
                                        <div class="image">
                                            <img src=" {{URL::asset('frontend/assets/images/messages/image1.jpg')}}"
                                                alt="#">
                                        </div>
                                        <span class="username">Laura Cormier</span>
                                        <span class="short-message">Hi, how are ...</span>
                                        <span class="unseen-message">02</span>
                                    </a>
                                </li>
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <li>
                                    <a href="javascript:void(0)">
                                        <div class="image">
                                            <img src="{{URL::asset('frontend/assets/images/messages/image2.jpg')}}"
                                                alt="#">
                                        </div>
                                        <span class="username">Paul Cox</span>
                                        <span class="short-message">I love your design...</span>
                                        <span class="time">NOW</span>
                                    </a>
                                </li>
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <li>
                                    <a href="javascript:void(0)">
                                        <div class="image">
                                            <img src="{{URL::asset('frontend/assets/images/messages/image3.jpg')}}"
                                                alt="#">
                                        </div>
                                        <span class="username">Carlos Dobson</span>
                                        <span class="short-message">Hi, how are ...</span>
                                        <span class="time">2 mins</span>
                                    </a>
                                </li>
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <li>
                                    <a href="javascript:void(0)">
                                        <div class="image busy">
                                            <img src="{{URL::asset('frontend/assets/images/messages/image4.jpg')}}"
                                                alt="#">
                                        </div>
                                        <span class="username">Dahia Divers</span>
                                        <span class="short-message">Nice to meet u ...</span>
                                        <span class="time">5 mins</span>
                                    </a>
                                </li>
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <li>
                                    <a href="javascript:void(0)">
                                        <div class="image">
                                            <img src="{{URL::asset('frontend/assets/images/messages/image5.jpg')}}"
                                                alt="#">
                                        </div>
                                        <span class="username">Jenifer Lofes</span>
                                        <span class="short-message">Hello, I need so...</span>
                                        <span class="time">NOW</span>
                                    </a>
                                </li>
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <li>
                                    <a href="javascript:void(0)">
                                        <div class="image">
                                            <img src="{{URL::asset('frontend/assets/images/messages/image6.jpg')}}"
                                                alt="#">
                                        </div>
                                        <span class="username">jebs Kristin</span>
                                        <span class="short-message">Hi, I have...</span>
                                        <span class="time">20 mins</span>
                                    </a>
                                </li>
                                <!-- End Single List -->
                            </ul>
                        </div>
                        <!-- End User List -->
                    </div> --}}
                        <div class="col-lg-12 col-12">
                            <!-- Start Chat List -->
                            <div class="chat-list" id="chat-list">
                                <ul class="single-chat-head" id="chat_messages">
                                    <!-- Messages will be dynamically added here -->
                                </ul>
                                <form action="javascript:void(0)">
                                    <div class="reply-block">
                                        <ul class="add-media-list">
                                            <li><a href="javascript:void(0)"><i class="lni lni-link"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-image"></i></a></li>
                                        </ul>

                                        <input id="user_id" value="{{ $ads->users->id }}" type="hidden">
                                        <input id="ads_id" value="{{ $ads->id }}" type="hidden">
                                        <input id="message" type="text" placeholder="Type your message here...">
                                        <button onclick="add_message()" class="reply-btn"><img
                                                src="{{ asset('frontend/assets/images/messages/send.svg') }}"
                                                alt="#"></button>
                                </form>
                            </div>
                        </div>



                        <!-- End Chat List -->
                    </div>
                </div>
            </div>
        </div>








    </div>
    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset($ads->images[0]->ImageURL) }}" id="current" alt="#">
                                </div>
                                <div class="images">
                                    @foreach ($ads->images as $image)
                                        <img src="{{ asset($image->ImageURL) }}" class="img" alt="#">
                                    @endforeach

                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $ads->Title }}</h2>
                            <p class="location"><i class="lni lni-map-marker"></i><a
                                    href="javascript:void(0)">{{ $ads->Location }}, {{ $ads->City }}</a></p>
                            <h3 class="price">{{ $ads->Price }} MAD</h3>
                            <div class="list-info">
                                <h4>Informations</h4>
                                <ul>
                                    <li><span>Condition:</span> {{ $ads->Condition }}</li>
                                    <li><span>categories:</span> {{ $ads->categories->Name }}</li>
                                    {{-- <li><span>Model:</span> Mackbook Pro</li> --}}
                                </ul>
                            </div>
                            <div class="contact-info">
                                <ul>
                                    <li>
                                        <a href="tel:+002562352589" class="call">
                                            <i class="lni lni-phone-set"></i>
                                            {{ $ads->users->phone }}
                                            <span>Call & Get more info</span>
                                        </a>
                                    </li>
                                    @if (Auth()->id() !== $ads->users->id)
                                    <li>
                                        <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                        aria-controls="offcanvasRight" class="mail">
                                        <i class="lni lni-envelope"></i>
                                    </a>
                                    
                                </li>
                                @endif

                                </ul>
                            </div>
                            <div class="social-share">
                                <h4>Share Ad</h4>
                                <ul>
                                    <li><a href="javascript:void(0)" class="facebook"><i
                                                class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)" class="twitter"><i
                                                class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)" class="google"><i class="lni lni-google"></i></a></li>
                                    <li><a href="javascript:void(0)" class="linkedin"><i
                                                class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)" class="pinterest"><i class="lni lni-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-details-blocks">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-12">
                        <!-- Start Single Block -->
                        <div class="single-block description">
                            <h3>Description</h3>
                            <p>
                                {{ $ads->Description }}.
                            </p>
                            @if ($ads->categories->Name === 'Vehicle')
                                <ul>
                                    <li>Model: {{ $ads->Model }}</li>
                                    <li>Puissance: {{ $ads->Puissance }}</li>
                                    <li>TypeCar: {{ $ads->TypeCar }}</li>

                                </ul>
                            @endif

                        </div>
                        <!-- End Single Block -->
                        <!-- Start Single Block -->
                        <div class="single-block tags">
                            <h3>Tags</h3>
                            <ul>
                                @foreach ($ads->tags as $tag)
                                    <li><a href="javascript:void(0)">{{ $tag->TagName }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- End Single Block -->
                        <!-- Start Single Block -->
                        <div class="single-block comments">
                            <h3>Comments</h3>
                            <!-- Start Single Comment -->
                            <div class="single-comment">
                                <img src="assets/images/testimonial/testi2.jpg" alt="#">
                                <div class="content">
                                    <h4>Luis Havens</h4>
                                    <span>25 Feb, 2023</span>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even slightly believable.
                                    </p>
                                    <a href="javascript:void(0)" class="reply"><i class="lni lni-reply"></i> Reply</a>
                                </div>
                            </div>
                            <!-- End Single Comment -->
                        </div>
                        <!-- End Single Block -->
                        <!-- Start Single Block -->
                        <div class="single-block comment-form">
                            <h3>Post a comment</h3>
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-box form-group">
                                            <input type="text" name="name" class="form-control form-control-custom"
                                                placeholder="Your Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-box form-group">
                                            <input type="email" name="email" class="form-control form-control-custom"
                                                placeholder="Your Email" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-box form-group">
                                            <textarea name="#" class="form-control form-control-custom" placeholder="Your Comments"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="button">
                                            <button type="submit" class="btn">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Block -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="item-details-sidebar">
                            <!-- Start Single Block -->
                            <div class="single-block author">
                                <h3>Author</h3>
                                <div class="content">
                                    <img src="{{ asset('images/' . $ads->users->image) }}" alt="Profile Image">

                                    <h4>{{ $ads->users->name }}</h4>
                                    <span>Member Since {{ $ads->users->created_at->format('F j, Y') }}</span>
                                    <a href="javascript:void(0)" class="see-all">See All Ads</a>
                                </div>
                            </div>
                            <!-- End Single Block -->
                            <!-- Start Single Block -->
                            <div class="single-block contant-seller comment-form ">
                                <h3>Contact Seller</h3>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="name"
                                                    class="form-control form-control-custom" placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <input type="email" name="email"
                                                    class="form-control form-control-custom" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea name="#" class="form-control form-control-custom" placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Single Block -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Item Details -->
    </div>



    @php
        $imageCurrentUser = URL::asset('frontend/assets/images/messages/image2.jpg');
        $imageOtherUser = URL::asset('frontend/assets/images/messages/image1.jpg');
    @endphp
@endsection

@section('script')
    <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
    </script>

    <script>
        var assetBaseUrl = '{{ asset('') }}';

        function messageUser() {


        let user_id = {{ $ads->users->id }}
          
         console.log('user_id',user_id)

            document.getElementById('chat_messages').innerHTML = '';

            axios.get('/user_message/' + user_id)
                .then(function(response) {
                    console.log('messages:', response);

                    response.data.messages.forEach(function(message) {
                        // Determine if the message is from the current user or other user
                        var isCurrentUserMessage = (message.from_id == user_id);

                        // Create <li> element with appropriate class based on message sender
                        var liClass = isCurrentUserMessage ? 'left' : 'right';
                        var li = document.createElement('li');
                        li.className = liClass;

                        // Create <img> element for user avatar (replace 'image' path as needed)
                        if (isCurrentUserMessage) {
                            var imgSrc = assetBaseUrl + 'frontend/assets/images/messages/image' + message
                                .from_id + '.jpg';
                            var img = document.createElement('img');
                            img.src = imgSrc;
                            img.alt = '#';
                        }


                        // Create <p> element for message text
                        var p = document.createElement('p');
                        p.className = isCurrentUserMessage ? 'text text-start' : 'text text-end';
                        p.textContent = message.message;

                        // Create <span> element for message timestamp
                        var span = document.createElement('span');
                        span.className = isCurrentUserMessage ? 'time  text-start' : 'time text-end';
                        span.textContent = formatTime(message.created_at);
                        if (isCurrentUserMessage) {

                            li.appendChild(img);
                        }
                        li.appendChild(p);
                        li.appendChild(span);

                        document.getElementById('chat_messages').appendChild(li);
                    });
                    scrollToBottomOfChat()

                })
                .catch(function(error) {
                    console.error('Error fetching messages:', error);
                });
        }
        messageUser()
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
            let ads_id = document.getElementById('ads_id').value;

            axios.post('/add_Message', {
                    message: message,
                    user_id: user_id,
                    ads_id: ads_id
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
                .catch(function(error) {
                    console.error('Error sending message:', error);
                });
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
