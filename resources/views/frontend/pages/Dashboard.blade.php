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

<div class="col-lg-9 col-md-8 col-12">
    <div class="main-content">
        <!-- Start Details Lists -->
        <div class="details-lists">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-icon">
                            <i class="lni lni-checkmark-circle"></i>
                        </div>
                        <h3>
                            {{ count($num_ads_sold) }}
                            <span>Ad Sold</span>
                        </h3>
                    </div>
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single List -->
                    <div class="single-list two">
                        <div class="list-icon">
                            <i class="lni lni-bolt"></i>
                        </div>
                        <h3>
                            {{ count($num_ads_approved) }}
                            <span>Approved Ads </span>
                        </h3>
                    </div>
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single List -->
                    <div class="single-list three">
                        <div class="list-icon">
                            <i class="lni lni-emoji-sad"></i>
                        </div>
                        <h3>
                            {{ count($num_ads_pending) }}
                            <span>Pending Ads </span>
                        </h3>
                    </div>
                    <!-- End Single List -->
                </div>
            </div>
        </div>
        <!-- End Details Lists -->
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Start Activity Log -->
                <div class="activity-log dashboard-block">
                    <h3 class="block-title">My Activity Log</h3>
                    <ul>
                        @if (!$notifications->isEmpty())
                            
                      
                        @foreach ($notifications as $notification)
                            
                     
                        <li>
                            <div class="log-icon">
                                <i class="lni lni-alarm"></i>
                            </div>
                            <a href="javascript:void(0)" class="title">{{ $notification->message }}</a>
                            <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                            <span class="remove"><a href="{{ route('remove_notification',$notification->id) }}"><i class="lni lni-close"></i></a></span>
                        </li>
                        @endforeach
                        @else
                        <li>
                            <div class="log-icon">
                                <i class="lni lni-alarm"></i>
                            </div>
                            <a href="javascript:void(0)" class="title">no data available</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- End Activity Log -->
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Start Recent Items -->
                <div class="recent-items dashboard-block">
                    <h3 class="block-title">Recent Ads</h3>
                    <ul>
                        @if (!$ads->isEmpty())
                        
                        @foreach ($ads as $ad)
                        <li>
                            <div class="image">
                                <a href="javascript:void(0)"><img src="{{ asset($ad->images[0]->ImageURL) }}" alt="#"></a>
                            </div>
                            <a href="javascript:void(0)" class="title">{{ $ad->Title }}</a>
                            <span class="time">{{ $ad->updated_at->diffForHumans() }}</span>
                        </li>
                        @endforeach
                        @else
                        <li>
                            <div class="log-icon">
                                <i class="lni lni-alarm"></i>
                            </div>
                            <a href="javascript:void(0)" class="title">no data available</a>
                        </li>
                        @endif


                     
                    </ul>
                </div>
                <!-- End Recent Items -->
            </div>
        </div>
    </div>
</div>