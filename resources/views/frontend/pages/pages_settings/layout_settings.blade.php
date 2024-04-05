
<!DOCTYPE html>
<html class="no-js" lang="zxx" >
    <!-- dir="rtl" -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('frontend/assets/images/favicon.svg')}}" />
  

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/LineIcons.2.0.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/animate.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/main.css')}}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//unpkg.com/alpinejs" defer></script>



    @yield('style')


</head>

<body>
   
    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src=" {{URL::asset('frontend/assets/images/logo/logo.svg')}}" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="{{ (Route::currentRouteName() == 'Home') ? 'active' : '' }} dd-menu collapsed" href="{{ route('Home') }}" 
                                          
                                            aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ (Route::currentRouteName() == 'Category') ? 'active' : '' }}" href="{{ route('Category') }}"  aria-label="Toggle navigation">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Listings</a>
                                      
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-4"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Pages</a>
                                        <ul class="sub-menu mega-menu collapse" id="submenu-1-4">
                                            <li class="single-block">
                                                <ul>
                                                    <li class="mega-menu-title">Essential Pages</li>
                                                    <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                                    <li class="nav-item"><a href="item-details.html">Ads Details</a></li>
                                                    <li class="nav-item"><a href="post-item.html">Ads Post</a></li>
                                                    <li class="nav-item"><a href="pricing.html">Pricing Table</a></li>
                                                    <li class="nav-item active"><a href="registration.html">Sign Up</a></li>
                                                    <li class="nav-item"><a href="login.html">Sign In</a></li>
                                                    <li class="nav-item"><a href="contact.html">Contact Us</a></li>
                                                    <li class="nav-item"><a href="faq.html">FAQ</a></li>
                                                    <li class="nav-item"><a href="404.html">Error Page</a></li>
                                                    <li class="nav-item"><a href="mail-success.html">Mail Success</a>
                                                    </li>
                                                    <li class="nav-item"><a href="coming-soon.html">Comming Soon</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="single-block">
                                                <ul>
                                                    <li class="mega-menu-title">Dashboard</li>
                                                    <li class="nav-item"><a href="dashboard.html">Account Overview</a>
                                                    </li>
                                                    <li class="nav-item"><a href="profile-settings.html">My Profile</a>
                                                    </li>
                                                    <li class="nav-item"><a href="my-items.html">My Ads</a></li>
                                                    <li class="nav-item"><a href="favourite-items.html">Favorite Ads</a>
                                                    </li>
                                                    <li class="nav-item"><a href="post-item.html">Ad post</a></li>
                                                    <li class="nav-item"><a href="bookmarked-items.html">Bookmarked Ad</a>
                                                    </li>
                                                    <li class="nav-item"><a href="messages.html">Messages</a></li>
                                                    <li class="nav-item"><a href="delete-account.html">Close account</a>
                                                    </li>
                                                    <li class="nav-item"><a href="invoice.html">Invoice</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-5"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Blog</a>
                                        <ul class="sub-menu collapse" id="submenu-1-5">
                                            <li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
                                            </li>
                                            <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                                            <li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
                                                    Sibebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            <div class="login-button">
                                <ul >
                                    @auth
                                    <li >
                                        <form id="logoutForm" action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a href="#" onclick="document.getElementById('logoutForm').submit();" class="{{ (Route::currentRouteName() == 'logout') ? 'active_auth' : '' }}"><i class="lni lni-enter"></i> Logout</a>
                                        </form>
                                        
                                    </li>
                                    @endauth
                                    @guest
                                    <li >
                                        <a class="{{ (Route::currentRouteName() == 'login') ? 'active_auth' : '' }}" href="{{ route('login') }}" ><i class="lni lni-enter"></i> Login</a>
                                    </li>
                                    <li>
                                        <a class="{{ (Route::currentRouteName() == 'Register') ? 'active_auth' : '' }}"  href="{{ route('Register') }}" ><i class="lni lni-user"></i> Register</a>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                            <div class="button header-button">
                                <a href="{{ route('post.ads') }}"   class="btn">Post an Ad</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Post Ad</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Post Ad</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
  
    <!-- Start Dashboard Section -->
    <section class="dashboard section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Start Dashboard Sidebar -->
                    <div class="dashboard-sidebar">
                        <div class="user-image">
                            <img src="assets/images/dashboard/user-image.jpg" alt="#">
                            <h3>Steve Aldridge
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a href="dashboard.html"><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                <li><a class="{{ (Route::currentRouteName() == 'ProfileSettings') ? 'active' : '' }}" href="{{ route('ProfileSettings') }}" ><i class="lni lni-pencil-alt"></i> Edit Profile</a>
                                </li>
                                <li><a class="{{ (Route::currentRouteName() == 'MyAds') ? 'active' : '' }}" href="{{ route('MyAds') }}" ><i class="lni lni-bolt-alt"></i> My Ads</a></li>
                                <li><a href="favourite-items.html"><i class="lni lni-heart"></i> Favourite ads</a></li>
                                <li><a class="{{ (Route::currentRouteName() == 'post.ads') ? 'active' : '' }}" href="{{ route('post.ads') }}" ><i class="lni lni-circle-plus"></i> Post An Ad</a></li>
                                <li><a href="bookmarked-items.html"><i class="lni lni-bookmark"></i> Bookmarked</a></li>
                                {{-- <li><a class="{{ (Route::currentRouteName() == 'Messages') ? 'active' : '' }}" href="{{ route('Messages') }}"><i class="lni lni-envelope"></i> Messages</a></li> --}}
                                <li><a href="delete-account.html"><i class="lni lni-trash"></i> Close account</a></li>
                                <li><a href="invoice.html"><i class="lni lni-printer"></i> Invoice</a></li>
                            </ul>
                            <div class="button">
                                <a class="btn" href="javascript:void(0)">Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Start Dashboard Sidebar -->
                </div>
                {{-- start --}}
                @if (Route::currentRouteName() === 'post.ads')
                @livewire('AddAds')
              
  
                @elseif(Route::currentRouteName() === 'MyAds') 
                @livewire('MyAds')
            @elseif(Route::currentRouteName() === 'ProfileSettings') 
                @include('frontend.pages.profile')
            {{-- @elseif(Route::currentRouteName() === 'Messages') 
                @livewire('Frontend.Messenger.AllMessenger') --}}
          
            @endif
  
                {{-- end --}}
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->

    {{-- {{ $slot }} --}}


 <!-- Start Footer Area -->
 <footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer mobile-app">
                        <h3>Mobile Apps</h3>
                        <div class="app-button">
                            <a href="javascript:void(0)" class="btn">
                                <i class="lni lni-play-store"></i>
                                <span class="text">
                                    <span class="small-text">Get It On</span>
                                    Google Play
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="btn">
                                <i class="lni lni-apple"></i>
                                <span class="text">
                                    <span class="small-text">Get It On</span>
                                    App Store
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer f-link">
                        <h3>Locations</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <ul>
                                    <li><a href="javascript:void(0)">Chicago</a></li>
                                    <li><a href="javascript:void(0)">New York City</a></li>
                                    <li><a href="javascript:void(0)">San Francisco</a></li>
                                    <li><a href="javascript:void(0)">Washington</a></li>
                                    <li><a href="javascript:void(0)">Boston</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <ul>
                                    <li><a href="javascript:void(0)">Los Angeles</a></li>
                                    <li><a href="javascript:void(0)">Seattle</a></li>
                                    <li><a href="javascript:void(0)">Las Vegas</a></li>
                                    <li><a href="javascript:void(0)">San Diego</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer f-link">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">How It's Works</a></li>
                            <li><a href="javascript:void(0)">Login</a></li>
                            <li><a href="javascript:void(0)">Signup</a></li>
                            <li><a href="javascript:void(0)">Help & Support</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer f-contact">
                        <h3>Contact</h3>
                        <ul>
                            <li>23 New Design Str, Lorem Upsum 10<br> Hudson Yards, USA</li>
                            <li>Tel. +(123) 1800-567-8990 <br> Mail. support@classigrids.com</li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <ul class="footer-bottom-links">
                                <li><a href="javascript:void(0)">Terms of use</a></li>
                                <li><a href="javascript:void(0)"> Privacy Policy</a></li>
                                <li><a href="javascript:void(0)">Advanced Search</a></li>
                                <li><a href="javascript:void(0)">Site Map</a></li>
                                <li><a href="javascript:void(0)">Information</a></li>
                            </ul>
                            <p class="copyright-text">Designed and Developed by <a href="https://graygrids.com/"
                                    rel="nofollow" target="_blank">GrayGrids</a>
                            </p>
                            <ul class="footer-social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
</footer>
<!--/ End Footer Area -->



<!-- ========================= JS here ========================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{URL::asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/tiny-slider.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/glightbox.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/count-up.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/main.js')}}"></script>
<script src="https://kit.fontawesome.com/e9ea9ee727.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>





@yield('script');

</body>

</html>