<div class="col-lg-9 col-md-12 col-12">
    <div class="main-content">
        <div class="dashboard-block mt-0">
            @if ($data_update)
            <h3 class="block-title">update Ad</h3>
            <div class="inner-block">
                <!-- Start Post Ad Tab -->
                <div class="post-ad-tab" id="stepp">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button disabled class="nav-link active" id="nav-item-info-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-item-info" type="button" role="tab" aria-controls="nav-item-info"
                                aria-selected="true">
                                <span class="serial">01</span>
                                Step
                                <span class="sub-title">Ad Information</span>
                            </button>
                            <button disabled class="nav-link  active" id="nav-item-details-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-item-details" type="button" role="tab"
                                aria-controls="nav-item-details" aria-selected="false">
                                <span class="serial">02</span>
                                Step
                                <span class="sub-title">Ad Details</span>
                            </button>
                            <button disabled class="nav-link active" id="nav-user-info-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-user-info" type="button" role="tab" aria-controls="nav-user-info"
                                aria-selected="false">
                                <span class="serial">03</span>
                                Step
                                <span class="sub-title">User Information</span>
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade  show active" id="nav-item-info" role="tabpanel"
                            aria-labelledby="nav-item-info-tab">
                            <!-- Start Post Ad Step One Content -->
                            <div class="step-one-content">
                                <form class="default-form-style">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Add Title*</label>
                                                <input type="text" wire:model="Title" placeholder="Enter Title">
                                                <div class=" text-danger ">@error('Title') {{ $message }} @enderror
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                            <!-- Start Post Ad Step One Content -->
                        </div>
                        <div class="tab-pane fade show active " id="nav-item-details" role="tabpanel"
                            aria-labelledby="nav-item-details-tab">
                            <!-- Start Post Ad Step Two Content -->
                            <div class="step-two-content">


                                <form class="default-form-style">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Add Price*</label>
                                                <input name="price" type="text" wire:model="Price"
                                                    placeholder="Enter Price">
                                                <div class=" text-danger ">@error("Price") {{ $message }} @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Select Currency*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select" wire:model="TypePrice">
                                                        <option selected value="Dollar">Dollar</option>
                                                        <option value="Euro">Euro</option>
                                                        <option value="Rupee">Rupee</option>
                                                    </select>
                                                    <div class="text-danger">@error("TypePrice") {{ $message }}
                                                        @enderror</div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="col-12">
                                            <div class="form-group mt-30">
                                                <label>Ad Description*</label>
                                                <textarea wire:model="Description"
                                                    placeholder="Input ad description"></textarea>
                                                <div class="text-danger">@error("Description") {{ $message }} @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Item Condition*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select" wire:model="Condition">
                                                        <option selected value="Brand New">Brand New</option>
                                                        <option value="Used">Used</option>
                                                    </select>
                                                    <div class=" text-danger ">@error("Condition") {{ $message }}
                                                        @enderror</div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </form>
                            </div>
                            <!-- Start Post Ad Step Two Content -->
                        </div>
                        <div class="tab-pane fade show active" id="nav-user-info" role="tabpanel"
                            aria-labelledby="nav-user-info-tab">
                            <!-- Start Post Ad Step Three Content -->
                            <div class="step-three-content">


                                <form class="default-form-style" id="stepp">
                                    <div class="row">

                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input disabled readonly type="text" placeholder="Enter your name"
                                                    wire:model="Username"
                                                    style="background-color: #e3e3e3 ; cursor: not-allowed;">
                                                <div class="text-danger">@error("Username") {{ $message }} @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Mobile Numbe*</label>
                                                <input disabled readonly type="text" placeholder="Enter mobile number"
                                                    wire:model="Phone"
                                                    style="background-color: #e3e3e3 ; cursor: not-allowed;">
                                                <div class="text-danger">@error("Phone") {{ $message }} @enderror</div>
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address*</label>
                                                <input type="text" placeholder="Enter a location" wire:model='Location'>
                                                <div class="text-danger">@error("Location") {{ $message }} @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">

                                            <div class="form-group button mb-0">
                                                <button wire:click="update_Ads" wire:loading.attr="disabled"
                                                    type="button" class="btn ">

                                                    <span>update Ads <i class="fa-solid fa-angles-right"></i> </span>
                                                    <span wire:loading wire:target="update_Ads"
                                                        class="spinner-border spinner-border-sm"
                                                        style="width: 23px; height: 23px;" role="status"
                                                        aria-hidden="true"></span>


                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Start Post Ad Step Three Content -->
                        </div>
                    </div>
                </div>
                <!-- End Post Ad Tab -->
            </div>
        </div>
        @else

        <h3 class="block-title">My Ads</h3>
        <nav class="list-nav">
            <ul>
                <li class="{{ $status === 'all' ? 'active' : '' }}" style="cursor: pointer">
                    <a wire:click="setStatus('all')">All Ads </a>
                </li>
                <li class="{{ $status === 'pending' ? 'active' : '' }}" style="cursor: pointer">
                    <a wire:click="setStatus('pending')">Pending </a>
                </li>
                <li class="{{ $status === 'approved' ? 'active' : '' }}" style="cursor: pointer">
                    <a wire:click="setStatus('approved')">Approved </a>
                </li>
                <li class="{{ $status === 'rejected' ? 'active' : '' }}" style="cursor: pointer">
                    <a wire:click="setStatus('rejected')">Rejected </a>
                </li>
                <li class="{{ $status === 'rejected' ? 'active' : '' }}" style="cursor: pointer">
                    <a wire:click="setStatus('sold')">Sold </a>
                </li>
            </ul>

        </nav>
        <!-- Start Items Area -->
        <div class="my-items">
            <!-- Start Item List Title -->
            <div class="item-list-title">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5 col-12">
                        <p>Ads </p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Category</p>
                    </div>

                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Status</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 align-right">
                        <p>Action</p>
                    </div>
                </div>
            </div>
            <!-- End List Title -->
            {{-- {{ dd($ads) }} --}}
            @if (!$ads->isEmpty())


            @foreach ($ads as $ad)


            <!-- Start Single List -->
            
            <div class="single-item-list">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="item-image">
                            <img src="{{ url($ad->images[0]->ImageURL)}}" alt="no img">

                            <div class="content">
                                <h3 class="title"><a href="javascript:void(0)">{{ $ad->Title }}</a></h3>
                                <span class="price">{{ $ad->Price }} MAD</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{ $ad->categories->Name }}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        @if ($ad->status === 'pending')
                        <p class=" text-warning ">{{ $ad->status }}</p>

                        @elseif($ad->status === 'approved')
                        <p class=" text-primary ">{{ $ad->status }}</p>

                        @elseif($ad->status === 'rejected')
                        <p class=" text-danger  ">{{ $ad->status }}</p>
                        @else
                        <p class=" text-success   ">{{ $ad->status }}</p>

                        @endif

                    </div>
                    <div class="col-lg-3 col-md-3 col-12 align-right">
                        <ul class="action-btn">
                            <li style="cursor: pointer"><a wire:click='updateAds({{ $ad->id }})'><i
                                        class="lni lni-pencil"></i></a></li>
                            {{-- <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li> --}}
                            <li style="cursor: pointer"><a wire:click='delete_Ads({{ $ad->id }})'><i
                                        class="lni lni-trash"></i></a></li>
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
            <!-- Pagination -->
            {{-- <div class="pagination left">
                <ul class="pagination-list">
                    <li><a href="javascript:void(0)">1</a></li>
                    <li class="active"><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)">4</a></li>
                    <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                </ul>
            </div> --}}

            <!--/ End Pagination -->
        </div>
        {{-- {{ $ads->links() }} --}}
        <div class="m-4">
            {{ $ads->links(data: ['scrollTo' => false]) }}
        </div>
        <!-- End Items Area -->
        @endif

    </div>
</div>
</div>
@script
<script>
    document.addEventListener('livewire:initialized',()=>{

        @this.on('swal',(event)=>{
            const data=event
            swal.fire({
                icon:data[0]['icon'],
                title:data[0]['title'],
                text:data[0]['text'],
            })
        })

        Livewire.on('delete-prompt', function () {
            swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this Category, this action is irreversible',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Trigger Livewire method to proceed with deletion
                    @this.call('deleteCategory');
                }
            });
        });

        
        Livewire.on('delete-Ads', async function () {
    const inputOptions = new Promise((resolve) => {
        setTimeout(() => {
            resolve({
                "#ff0000": "I sold it on avito",
                "#00ff00": "I sold it another way",
                "#0000ff": "I just want to delete it"
            });
        }, 1000);
    });
    
    const { value: color } = await Swal.fire({
        title: "Share with us where you sold your product",
        width: '50%',
        input: "radio",
        inputOptions,
        inputValidator: (value) => {
            if (!value) {
                return "You need to choose something!";
            }
        }
    });

    if (color) {
        Swal.fire({
            title: "Are you sure to delete this Ads?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
              
                @this.call('deleteAds');
            }
        });
    }

   
});


                    

        Livewire.on('prompt-confi-deleted', function () {
            swal.fire({
                title: 'Deleted',
                text: 'ads has been deleted',
                icon: 'success',
            });
        });

        Livewire.on('prompt-update_ads', function () {
            swal.fire({
                title: 'Update Ads',
                text: 'ads has been Updated',
                icon: 'success',
            });
        });


    })
</script>
@endscript
