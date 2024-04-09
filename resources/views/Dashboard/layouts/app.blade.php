<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="Dashboard/assets/images/favicon.svg" type="image/x-icon" />
    <title>@yield('title')</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/bootstrap.icon.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/main.css') }}" />
    @yield('css')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class=" d-flex  justify-content-center mb-5">
            <a href="index.html">
                <img src=" {{ URL::asset('frontend\assets\ADS-Logo_RGB.svg') }}" height="85px" alt="Logo">
            </a>
        </div>

        <nav class="sidebar-nav">
            <ul>


                <li class="nav-item {{ Route::currentRouteName() == 'Dashboard.Home' ? 'active' : '' }}">
                    <a href="{{ route('Dashboard.Home') }}">
                        <span class="icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z">
                                </path>
                                <path
                                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z">
                                </path>
                            </svg>
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'Dashboard.Categorie' ? 'active' : '' }}">
                    <a href="{{ route('Dashboard.Categorie') }}">
                        <span class="icon">
                            <i class="lni lni-credit-cards"></i>
                        </span>
                        <span class="text">Categorie</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'Dashboard.Users' ? 'active' : '' }}">
                    <a href="{{ route('Dashboard.Users') }}">
                        <span class="icon orange">
                            <i class="lni lni-user"></i>
                        </span>
                        <span class="text">Users</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'Dashboard.Ads' ? 'active' : '' }}">
                    <a href="{{ route('Dashboard.Ads') }}">
                        <span class="icon">
                            <i class="lni lni-cart-full"></i>
                        </span>
                        <span class="text">Ads</span>
                    </a>
                </li>

            </ul>
        </nav>

    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-15">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-chevron-left me-2"></i> Menu
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">

                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <div class="image">
                                                <img src="{{ URL::asset('Dashboard/assets/images/profile/profile-image.png') }}"
                                                    alt="" />
                                            </div>
                                            <div>
                                                <h6 class="fw-500">{{ Auth()->user()->name }}</h6>
                                                <p>Admin</p>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <div class="author-info flex items-center !p-1">
                                            <div class="image">
                                                <img src="{{ URL::asset('Dashboard/assets/images/profile/profile-image.png') }}"
                                                    alt="image">
                                            </div>
                                            <div class="content">
                                                <h4 class="text-sm">{{ Auth()->user()->name }}</h4>
                                                <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs"
                                                    href="#">{{ Auth()->user()->email }}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>

                                    @auth
                                        <li>
                                            <form id="logoutForm" action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <a href="javascript:void(0)"
                                                    onclick="document.getElementById('logoutForm').submit();"
                                                    class="{{ Route::currentRouteName() == 'logout' ? 'active_auth' : '' }}"><i
                                                        class="lni lni-enter"></i> Logout</a>
                                            </form>

                                        </li>
                                    @endauth
                                    <li class="divider"></li>


                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        @yield('content')

        <!-- ========== section end ========== -->
        @if (Route::currentRouteName() == 'Dashboard.Categorie')
            <livewire:Dashboard.CategorieController>
        @endif


    </main>
    <!-- ======== main-wrapper end =========== -->



    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ URL::asset('Dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/e9ea9ee727.js" crossorigin="anonymous"></script>

    @yield('js')



</body>

</html>
