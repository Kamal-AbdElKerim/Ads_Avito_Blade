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
                            <h2>Welcome to ADS</h2>
                            <p>Buy And Sell Everything From Used Cars To Mobile Phones And <br>Computers,
                                Or Search For Property, Jobs And More.</p>
                        </div>
                        <!-- End Hero Text -->
                    </div>
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
                        <h3 class="counter"><span id="secondo1" class="countup" cup-end="1250">{{ count($num_ADS) }}</span>+</h3>
                        <p>Regular Ads</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                        <h3 class="counter"><span id="secondo2" class="countup" cup-end="350">{{ count($citys) }}</span>+</h3>
                        <p>Locations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="2500">{{ count($num_users) }}</span>+</h3>
                        <p>Reguler Members</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="250">{{ count($num_categories) }}</span>+</h3>
                        <p>Categories</p>
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
                            <p class="wow " data-wow-delay=".6s">Dive into our curated selection organized by category. Whether you're searching for tech essentials, stylish accessories, or home comforts, we've categorized our offerings to streamline your exploration.</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($categories as $categorie)
    
                    <div class="col-lg-2 col-md-3 col-12">
                        <!-- Start Single Category -->
                        <a href="javascript:void(0)" class="single-cat wow fadeInUp" data-wow-delay=".1s">
                            <div class="icon">
                                <img src="{{ asset($categorie->icon) }}" alt="#">
                            </div>
                            <h3>{{ $categorie->Name }}</h3>
                            <h5 class="total"></h5>
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
                        <p class="wow fadeInUp" data-wow-delay=".6s">Welcome to the cutting edge of innovation! Discover our newest arrivals, meticulously crafted to elevate your experience. From sleek gadgets to sophisticated designs.</p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    @foreach ($ads as $ad)
                        
                 
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".1s">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img
                                        src="{{ asset($ad->images[0]->ImageURL) }}" alt="#"></a>
                                <div class="author">
                                    <div class="author-image">
                                        <a href="javascript:void(0)"><img src="{{ asset('frontend/assets/images/items-grid/author-1.jpg') }}"
                                                alt="#">
                                            <span>{{ $ad->users->name }}</span></a>
                                    </div>
                                    <p class="sale">For Sale</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag">{{ $ad->categories->Name }}</a>
                                    <h3 class="title">
                                        <a href="item-details.html">{{ $ad->Title }}</a>
                                    </h3>
                                    <p class="update-time">{{ $ad->updated_at->diffForHumans() }}</p>
                                    {{-- <ul class="rating">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><a href="javascript:void(0)">(35)</a></li>
                                    </ul> --}}
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> {{ $ad->City }},
                                            {{ $ad->Location }}</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> Feb 18, 2023</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Start From: <span>{{ $ad->Price }} MAD</span></p>
                                    @if ($ad->favorites->contains('UserID', Auth()->id()))
                                    <li class="like">
                                        <a href="{{ route('remove_favorite', $ad->id) }}">
                                            <i class="fa-solid fa-heart" style="color: #dd3636;"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="like">
                                        <a href="{{ route('favorite', $ad->id) }}">
                                            <i class="lni lni-heart"></i>
                                        </a>
                                    </li>
                                @endif
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>

                    @endforeach
                
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
                            <p class="wow fadeInUp" data-wow-delay=".6s">Post your ad for free on ADS</p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                <a href="{{ route('post.ads') }}" class="btn">Post an ad now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call Action Area -->


   



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