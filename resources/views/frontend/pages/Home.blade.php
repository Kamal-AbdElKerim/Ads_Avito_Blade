@extends('frontend.layouts.app')


@section('title')
    
@endsection

@section('content')
@if(Session::has('success'))
<script>
    // Display a SweetAlert2 alert
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ Session::get("success") }}',
    });
</script>
@endif
    
    <!-- Start Hero Area -->
    <section class="hero-area style2 overlay">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-12  col-md-12 col-12">
                    <div class="hero-text wow  fadeInLeft" data-wow-delay=".3s">
                        <!-- Start Hero Text -->
                        <div class="section-heading  ">
                            <h2>Welcome to ClassiGrids</h2>
                            <p>Buy And Sell Everything From Used Cars To Mobile Phones And <br>Computers,
                                Or Search For Property, Jobs And More.</p>
                        </div>
                        <!-- End Hero Text -->
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                 
                    <!-- Start Search Form -->
                    <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 p-0">
                                <div class="search-input">
                                    <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                    <input class="input_icone" type="text" name="keyword" id="keyword"
                                        placeholder="Product keyword">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 p-0">
                                <div class="search-input">
                                    <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                    <select class="input_icone" name="category" id="category">
                                        <option value="none" selected disabled>Categories</option>
                                        <option value="none">Vehicle</option>
                                        <option value="none">Electronics</option>
                                        <option value="none">Mobiles</option>
                                        <option value="none">Furniture</option>
                                        <option value="none">Fashion</option>
                                        <option value="none">Jobs</option>
                                        <option value="none">Real Estate</option>
                                        <option value="none">Animals</option>
                                        <option value="none">Education</option>
                                        <option value="none">Matrimony</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 p-0">
                                <div class="search-input">
                                    <label for="location"><i class="lni lni-map-marker theme-color"></i></label>
                                    <select class="input_icone" name="location" id="location">
                                        <option value="none" selected disabled>Locations</option>
                                        <option value="none">New York</option>
                                        <option value="none">California</option>
                                        <option value="none">Washington</option>
                                        <option value="none">Birmingham</option>
                                        <option value="none">Chicago</option>
                                        <option value="none">Phoenix</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 p-0">
                                <div class="search-btn button">
                                    <button class="btn"><i class="lni lni-search-alt"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Search Form -->

                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Achievement Area -->
    <section class="our-achievement section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="counter"><span id="secondo1" class="countup" cup-end="1250">1250</span>+</h3>
                        <p>Regular Ads</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                        <h3 class="counter"><span id="secondo2" class="countup" cup-end="350">350</span>+</h3>
                        <p>Locations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="2500">2500</span>+</h3>
                        <p>Reguler Members</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="250">250</span>+</h3>
                        <p>Premium Ads</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achievement Area -->


    <!-- Start Categories Area -->
    <section class="categories style2">
        <div class="container">
            <div class="cat-inner">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2 class="wow " data-wow-delay=".4s">Explore by Category</h2>
                            <p class="wow " data-wow-delay=".6s">There are many variations of passages of Lorem
                                Ipsum available, but the majority have suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($categories as $categorie)
    
                    <div class="col-lg-2 col-md-3 col-12">
                        <!-- Start Single Category -->
                        <a href="category.html" class="single-cat wow fadeInUp" data-wow-delay=".1s">
                            <div class="icon">
                                <img src="{{ asset($categorie->icon) }}" alt="#">
                            </div>
                            <h3>{{ $categorie->Name }}</h3>
                            <h5 class="total">35</h5>
                        </a>
                        <!-- End Single Category -->
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /End Categories Area -->





    <!-- Start Items Grid Area -->
    <section class="items-grid section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Latest Products</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".1s">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img
                                        src="assets/images/items-grid/img1.jpg" alt="#"></a>
                                <div class="author">
                                    <div class="author-image">
                                        <a href="javascript:void(0)"><img src="assets/images/items-grid/author-1.jpg"
                                                alt="#">
                                            <span>Smith jeko</span></a>
                                    </div>
                                    <p class="sale">For Sale</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag">Mobile Phones</a>
                                    <h3 class="title">
                                        <a href="item-details.html">Apple Iphone X</a>
                                    </h3>
                                    <p class="update-time">Last Updated: 1 hours ago</p>
                                    <ul class="rating">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><a href="javascript:void(0)">(35)</a></li>
                                    </ul>
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> New York,
                                                US</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> Feb 18, 2023</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Start From: <span>$200.00</span></p>
                                    <a href="javascript:void(0)" class="like"><i class="lni lni-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".1s">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img
                                        src="assets/images/items-grid/img2.jpg" alt="#"></a>
                                <div class="author">
                                    <div class="author-image">
                                        <a href="javascript:void(0)"><img src="assets/images/items-grid/author-2.jpg"
                                                alt="#">
                                            <span>Alex Jui</span></a>
                                    </div>
                                    <p class="sale">For Sale</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag">Real Estate</a>
                                    <h3 class="title">
                                        <a href="item-details.html">Amazing Room for Rent</a>
                                    </h3>
                                    <p class="update-time">Last Updated: 2 hours ago</p>
                                    <ul class="rating">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><a href="javascript:void(0)">(20)</a></li>
                                    </ul>
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> Dallas,
                                                Washington</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> Jan 7, 2023</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Start From: <span>$450.00</span></p>
                                    <a href="javascript:void(0)" class="like"><i class="lni lni-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".1s">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img
                                        src="assets/images/items-grid/img3.jpg" alt="#"></a>
                                <div class="author">
                                    <div class="author-image">
                                        <a href="javascript:void(0)"><img src="assets/images/items-grid/author-3.jpg"
                                                alt="#">
                                            <span>Devid Milan</span></a>
                                    </div>
                                    <p class="sale">For Sale</p>
                                </div>
                                <p class="item-position"><i class="lni lni-bolt"></i> Featured</p>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag">Mobile Phones</a>
                                    <h3 class="title">
                                        <a href="item-details.html">Canon SX Powershot D-SLR</a>
                                    </h3>
                                    <p class="update-time">Last Updated: 3 hours ago</p>
                                    <ul class="rating">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><a href="javascript:void(0)">(55)</a></li>
                                    </ul>
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> New York,
                                                US</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> Mar 18, 2023</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Start From: <span>$700.00</span></p>
                                    <a href="javascript:void(0)" class="like"><i class="lni lni-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".1s">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img
                                        src="assets/images/items-grid/img4.jpg" alt="#"></a>
                                <div class="author">
                                    <div class="author-image">
                                        <a href="javascript:void(0)"><img src="assets/images/items-grid/author-4.jpg"
                                                alt="#">
                                            <span>Jesia Jully</span></a>
                                    </div>
                                    <p class="sale">For Sale</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag">Vehicles</a>
                                    <h3 class="title">
                                        <a href="item-details.html">BMW 5 Series GT Car</a>
                                    </h3>
                                    <p class="update-time">Last Updated: 4 hours ago</p>
                                    <ul class="rating">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><a href="javascript:void(0)">(35)</a></li>
                                    </ul>
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> New York,
                                                US</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> Apr 12, 2023</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Start From: <span>$1000.00</span></p>
                                    <a href="javascript:void(0)" class="like"><i class="lni lni-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".5s">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img
                                        src="assets/images/items-grid/img5.jpg" alt="#"></a>
                                <div class="author">
                                    <div class="author-image">
                                        <a href="javascript:void(0)"><img src="assets/images/items-grid/author-5.jpg"
                                                alt="#">
                                            <span>Thomas Deco</span></a>
                                    </div>
                                    <p class="sale">For Sale</p>
                                </div>
                                <p class="item-position"><i class="lni lni-bolt"></i> Featured</p>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag">Apple</a>
                                    <h3 class="title">
                                        <a href="item-details.html">Apple Macbook Pro 13 Inch</a>
                                    </h3>
                                    <p class="update-time">Last Updated: 5 hours ago</p>
                                    <ul class="rating">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><a href="javascript:void(0)">(35)</a></li>
                                    </ul>
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> Louis,
                                                Missouri, US</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> May 25, 2023</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Start From: <span>$550.00</span></p>
                                    <a href="javascript:void(0)" class="like"><i class="lni lni-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".6s">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img
                                        src="assets/images/items-grid/img6.jpg" alt="#"></a>
                                <div class="author">
                                    <div class="author-image">
                                        <a href="javascript:void(0)"><img src="assets/images/items-grid/author-6.jpg"
                                                alt="#">
                                            <span>Jonson zack</span></a>
                                    </div>
                                    <p class="sale">For Sale</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag">Restaurant</a>
                                    <h3 class="title">
                                        <a href="item-details.html">Cream Restaurant</a>
                                    </h3>
                                    <p class="update-time">Last Updated: 7 hours ago</p>
                                    <ul class="rating">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><a href="javascript:void(0)">(20)</a></li>
                                    </ul>
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> New York,
                                                US</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> Feb 18, 2023</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Start From: <span>$500.00</span></p>
                                    <a href="javascript:void(0)" class="like"><i class="lni lni-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area -->




    <!-- Start How Works Area -->
    <section class="how-works section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">How it Works</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single Work -->
                    <div class="single-work wow fadeInUp" data-wow-delay=".2s">
                        <span class="serial">01</span>
                        <h3>Create Account</h3>
                        <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                    </div>
                    <!-- End Single Work -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single Work -->
                    <div class="single-work wow fadeInUp" data-wow-delay=".4s">
                        <span class="serial">02</span>
                        <h3>Post Your Ads</h3>
                        <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                    </div>
                    <!-- End Single Work -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single Work -->
                    <div class="single-work wow fadeInUp" data-wow-delay=".6s">
                        <span class="serial">03</span>
                        <h3>Sell Your Item</h3>
                        <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                    </div>
                    <!-- End Single Work -->
                </div>
            </div>
        </div>
    </section>
    <!-- End How Works Area -->

    <!-- Start Call Action Area -->
    <section class="call-action overlay section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <div class="content">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Do you have something to sell?</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Post your ad for free on ClassiGrids</p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                <a href="javascript:void(0)" class="btn">Post an ad now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call Action Area -->


    <!-- Start Items Tab Area -->
    <section class="items-tab section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Trending Ads</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-latest-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-latest" type="button" role="tab" aria-controls="nav-latest"
                                aria-selected="true">Latest Ads</button>
                            <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular"
                                aria-selected="false">Popular Ads</button>
                            <button class="nav-link" id="nav-random-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-random" type="button" role="tab" aria-controls="nav-random"
                                aria-selected="false">Random Ads</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-latest" role="tabpanel"
                            aria-labelledby="nav-latest-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-1.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Apple Iphone X</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Boston</a></p>
                                            <ul class="info">
                                                <li class="price">$890.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-2.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Others</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Travel Kit</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>San Francisco</a></p>
                                            <ul class="info">
                                                <li class="price">$580.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-3.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Nikon DSLR Camera</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Alaska, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$560.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-4.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Poster Paint</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Las Vegas</a></p>
                                            <ul class="info">
                                                <li class="price">$85.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-5.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Official Metting Chair</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Alaska, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$750.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-6.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge rent">Rent</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Books & Magazine</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Story Book</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>New York, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$120.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-7.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Cctv camera</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Delhi, India</a></p>
                                            <ul class="info">
                                                <li class="price">$350.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-8.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Samsung Glalaxy S8</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Delaware, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$299.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-2.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Others</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Travel Kit</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>San Francisco</a></p>
                                            <ul class="info">
                                                <li class="price">$580.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-3.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Nikon DSLR Camera</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Alaska, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$560.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-1.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Apple Iphone X</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Boston</a></p>
                                            <ul class="info">
                                                <li class="price">$890.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-4.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Poster Paint</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Las Vegas</a></p>
                                            <ul class="info">
                                                <li class="price">$85.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-7.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Cctv camera</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Delhi, India</a></p>
                                            <ul class="info">
                                                <li class="price">$350.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-8.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Samsung Glalaxy S8</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Delaware, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$299.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-5.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Official Metting Chair</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Alaska, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$750.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-6.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge rent">Rent</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Books & Magazine</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Story Book</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>New York, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$120.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-random" role="tabpanel" aria-labelledby="nav-random-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-3.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Nikon DSLR Camera</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Alaska, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$560.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-4.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Poster Paint</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Las Vegas</a></p>
                                            <ul class="info">
                                                <li class="price">$85.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-5.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Official Metting Chair</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Alaska, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$750.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-1.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Apple Iphone X</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Boston</a></p>
                                            <ul class="info">
                                                <li class="price">$890.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-2.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Others</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Travel Kit</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>San Francisco</a></p>
                                            <ul class="info">
                                                <li class="price">$580.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-6.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge rent">Rent</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Books & Magazine</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Story Book</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>New York, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$120.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-7.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Cctv camera</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Delhi, India</a></p>
                                            <ul class="info">
                                                <li class="price">$350.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="assets/images/items-tab/item-8.jpg"
                                                    alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="item-details.html">Samsung Glalaxy S8</a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i
                                                        class="lni lni-map-marker">
                                                    </i>Delaware, USA</a></p>
                                            <ul class="info">
                                                <li class="price">$299.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i
                                                            class="lni lni-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Items Tab Area -->

    <!-- Start Why Choose Area -->
    <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Why Choose Us</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="choose-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-book"></i>
                                    <h4>Fully Documented</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-leaf"></i>
                                    <h4>Clean & Modern Design</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-cog"></i>
                                    <h4>Completely Customizable</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-pointer-up"></i>
                                    <h4>User Friendly</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-layout"></i>
                                    <h4>Awesome Layout</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-laptop-phone"></i>
                                    <h4>Fully Responsive</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Why Choose Area -->


{{-- <script>
    Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Your work has been saved",
  showConfirmButton: false,
  timer: 1500
});
</script> --}}
@endsection