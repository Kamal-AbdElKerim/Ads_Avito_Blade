<div>
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Category</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>category</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500 // Close alert after 1.5 seconds
        });
    </script>
@endif
    <!-- Start Category -->
    <section class="category-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="category-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>Search Ads By Title</h3>
                            <form>
                                <input wire:model.live='Search_title' type="text" placeholder="Search Here...">
                                {{-- <button wire:click='SearchTitle' type="button"><i
                                        class="lni lni-search-alt"></i></button> --}}
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget ">
                            <div class=" d-flex  justify-content-between ">
                                <h3>All Categories</h3>
                                <h3 class="show_Categories" wire:click='show_Categories'><i
                                        class="fa-solid fa-caret-down"></i></h3>
                            </div>
                            @if ($show)

                            <ul class="list">
                                {{-- {{ dd($categorys) }} --}}
                                @foreach ($categorys as $category)
                                <li>
                                    <a class="Category_hover {{ $idCategory == $category->id ? 'Category_active' : '' }}"
                                        wire:click='FilterCategorie({{ $category->id }})'>
                                        <img class="me-2" src="{{ asset($category->icon) }}" width="23px" height="23px"
                                            alt="">
                                        {{ $category->Name }}
                                        <span>{{ $category->ads_count }}</span>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                            @endif

                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget ">
                            <h3>Citys</h3>
                            <div class="single-widget search">
                            <div class=" d-flex  justify-content-between ">
                                <select class="form-select w-75 " aria-label="Default select example"
                                    wire:model='CitySearch'>
                                    <option value="all" selected>all</option>
                                    @foreach ($city_json as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>


                                    @endforeach
                                </select>
                                {{-- <button wire:click='SearchCity' class=" w-25  ms-3  btn btn-outline-primary">
                                    <h6><i class="fa-solid fa-magnifying-glass-location"></i></h6>
                                </button> --}}
                                    <form action="javascript:void(0)">
                                       
                                        <button wire:click='SearchCity' ><i class="lni lni-search-alt"></i></button>
                                    </form>
                                </div>

                            </div>


                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <input wire:model.live="priceRange" type="range" class="form-range" name="range" step="1"
                                min="100" max="10000" value="10" onchange="rangePrimary.value=value">
                            <div class="range-inner mt-3">
                                <label>{{ $priceRange }} MAD</label>
                                {{-- <input type="text" id="rangePrimary" placeholder="100" /> --}}
                            </div>
                        </div>
                        <!-- End Single Widget -->
                     
                        <!-- End Single Widget --> 
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="category-grid-list">
                        <div class="row">
                            <div class="col-12" id="paginated-ads">
                                <div class="category-grid-topbar">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <h3 class="title">Showing {{ count($ads) }} ads found</h3>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-grid-tab"
                                                        data-bs-toggle="tab" data-bs-target="#nav-grid" type="button"
                                                        role="tab" aria-controls="nav-grid" aria-selected="true"><i
                                                            class="lni lni-grid-alt"></i></button>

                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                        aria-labelledby="nav-grid-tab">
                                        <div class="row">

                                            @if (!$ads->isEmpty())
                                            @foreach ($ads as $ad)

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Item -->
                                                <div class="single-item-grid">
                                                    <div class="image">
                                                        <a href=" {{ route('SinglPage',$ad->id) }}" ><img
                                                                src="{{ asset($ad->images[0]->ImageURL) }}"
                                                                width="248px" height="248px" alt="#"></a>
                                                        <i class=" cross-badge lni lni-bolt"></i>
                                                        <span class="flat-badge sale">Sale</span>
                                                    </div>
                                                    <div class="content">
                                                        <a href="javascript:void(0)" class="tag">{{
                                                            $ad->categories->Name }}</a>
                                                        <h3 class="title">
                                                            <a href=" {{ route('SinglPage',$ad->id) }}" >{{ $ad->Title }}</a>
                                                        </h3>
                                                        <p class="location"><a href="javascript:void(0)"><i
                                                                    class="lni lni-map-marker">
                                                                </i>{{ $ad->City }}</a></p>
                                                        <ul class="info">
                                                            <li class="price">{{ $ad->Price }} MAD</li>
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
                                                        
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- End Single Item -->
                                               

                                            </div>
                                            @endforeach
                                            @else


                                            <section class="bg-light">
                                                <div class="container-fluid">
                                                    <div class="row row-cols-1 justify-content-center py-5">
                                                        <div class="col-xxl-9 mb-4">
                                                            <img src="https://pbs.twimg.com/media/DDPKLHNVwAA87D5.jpg"
                                                                alt="">
                                                        </div><!-- /col -->

                                                    </div>

                                                </div>
                                            </section>

                                            <p class="py-5 small text-center text-muted"> Powered by <a
                                                    href="https://library.livecanvas.com/">LiveCanvas HTML Templates for
                                                    Bootstrap</a>
                                            </p>


                                            @endif

                                        </div>
                                        <div class="mt-5 d-flex  justify-content-center   ">
                                            {{ $ads->links(data: ['scrollTo' => '#paginated-ads']) }}

                                        </div>

                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Category -->
</div>