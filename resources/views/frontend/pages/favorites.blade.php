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

<div class="col-lg-9 col-md-12 col-12">
    <div class="main-content">
        <div class="dashboard-block mt-0">
            <h3 class="block-title">My Favorites</h3>
            <nav class="list-nav">
                <ul>
                    <li class="active"><a href="javascript:void(0)">Featured <span>{{ count($favorites) }}</span></a></li>
                </ul>
            </nav>
            <!-- Start Items Area -->
            <div class="my-items">
                <!-- Start List Title -->
                <div class="item-list-title">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-5 col-12">
                            <p>Job Title</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Category</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Condition</p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 align-right">
                            <p>Action</p>
                        </div>
                    </div>
                </div>
                @if (!$favorites->isEmpty())

                @foreach ($favorites as $favorite)
                    
              
                <!-- Start Single List -->
                <div class="single-item-list">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-5 col-12">
                            <div class="item-image">
                                <img src="{{ asset($favorite->ads->images[0]->ImageURL) }}" alt="#">
                                <div class="content">
                                    <h3 class="title"><a href="javascript:void(0)">{{ $favorite->ads->title }}</a></h3>
                                    <span class="price  ">{{ $favorite->ads->Price }} MAD</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ $favorite->ads->categories->Name }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ $favorite->ads->Condition }}</p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 align-right">
                            <ul class="action-btn">
                                <li><a href="{{ route('SinglPage',$favorite->ads->id) }}"><i class="lni lni-eye"></i></a></li>
                                <li><a href="{{ route('remove_favorite', $favorite->ads->id) }}"><i class="fa-solid fa-heart-circle-xmark" style="color: #ff004c;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single List -->
                @endforeach
                @else
                <div class=" d-flex  justify-content-center mt-3">
    
                    <p>no data available</p>
                </div>
    
    
                @endif
            </div>
            <!-- End Items Area -->
        </div>
    </div>
</div>