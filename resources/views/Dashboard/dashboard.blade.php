@extends('Dashboard.layouts.app')


@section('title')
    
@endsection

@section('content')
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title">
            <h2>Ads Dashboard</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#0">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Ads
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="row">
      <div class="col-xl-6 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon purple">
            <i class="lni lni-cart-full"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">New Ads</h6>
            <h3 class="text-bold mb-10">{{ count($ads) }}</h3>
         
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-6 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon success">
            <i class="lni lni-dollar"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Ads Sold</h6>
            <h3 class="text-bold mb-10">{{ count($ads_sold) }}</h3>
          
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-6 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon primary">
            <i class="lni lni-credit-cards"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Categories</h6>
            <h3 class="text-bold mb-10">{{ count($categories) }}</h3>
          
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-6 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon orange">
            <i class="lni lni-user"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">New User</h6>
            <h3 class="text-bold mb-10">{{ count($users) }}</h3>
         
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
  
  </div>
  <!-- end container -->
</section>
@endsection