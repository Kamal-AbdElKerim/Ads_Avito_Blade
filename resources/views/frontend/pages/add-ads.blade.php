<div class="col-lg-9 col-md-8 col-12">
    <div class="main-content">
        <!-- Start Post Ad Block Area -->
        <div class="dashboard-block mt-0">
            <h3 class="block-title">Post Ad</h3>
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
                            <button disabled class="nav-link   {{ ($next_step2 || $next_step3) ? 'active' : '' }}"
                                id="nav-item-details-tab" data-bs-toggle="tab" data-bs-target="#nav-item-details"
                                type="button" role="tab" aria-controls="nav-item-details" aria-selected="false">
                                <span class="serial">02</span>
                                Step
                                <span class="sub-title">Ad Details</span>
                            </button>
                            <button disabled class="nav-link  {{ ($next_step3) ? 'active' : '' }}" id="nav-user-info-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-user-info" type="button" role="tab" aria-controls="nav-user-info"
                                aria-selected="false">
                                <span class="serial">03</span>
                                Step
                                <span class="sub-title">User Information</span>
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade  {{ (!$next_step3 && !$next_step2) ? 'show active' : '' }}" id="nav-item-info"
                            role="tabpanel" aria-labelledby="nav-item-info-tab">
                            <!-- Start Post Ad Step One Content -->
                            <div class="step-one-content">
                                <form class="default-form-style">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Add Title*</label>
                                                <input name="title" type="text" wire:model="Title"
                                                    wire:keyup='validation' placeholder="Enter Title">
                                                <div class=" text-danger ">@error('Title') {{ $message }} @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Category*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select" wire:model="Category"
                                                        wire:click='validation'>
                                                        {{-- <option value="none">Select a Category</option> --}}
                                                        @foreach ($categories as $categorie)

                                                        <option value="{{ $categorie->id }}">{{ $categorie->Name }}
                                                        </option>

                                                        @endforeach

                                                    </select>
                                                    <div>@error('Category') {{ $message }} @enderror</div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button mb-0">
                                                <button wire:click="Step1" wire:loading.attr="disabled" type="button"
                                                    class="btn ">

                                                    <span>Next Step <i class="fa-solid fa-angles-right"></i> </span>
                                                    <span wire:loading wire:target="Step1"
                                                        class="spinner-border spinner-border-sm"
                                                        style="width: 23px; height: 23px;" role="status"
                                                        aria-hidden="true"></span>


                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Start Post Ad Step One Content -->
                        </div>
                        <div class="tab-pane fade {{ ($next_step2 && !$next_step3) ? 'show active' : '' }} " id="nav-item-details"
                            role="tabpanel" aria-labelledby="nav-item-details-tab">
                            <!-- Start Post Ad Step Two Content -->
                            <div class="step-two-content">
                                <button wire:click="Step1" wire:loading.attr="disabled" type="button"
                                    class="btn alt-btn btn-secondary mt-4">

                                    <span wire:loading wire:target="Step1" class="spinner-grow spinner-grow-sm"
                                        style="width: 24px; height: 24px;" aria-hidden="true"></span>
                                    <span role="status"><i class="fa-solid fa-angles-left"></i> Previous</span>


                                </button>

                                <form class="default-form-style">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Add Price*</label>
                                                <input name="price" type="number" wire:model.live="Price" 
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
                                                    <div class="text-danger">@error("TypePrice") {{ $message }} @enderror</div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <div class="upload-input">
                                                <input type="file" id="upload" wire:model.live="uplode_img" multiple>
                                                <label  class="text-center content d-flex  justify-content-start">
                                                    <span class="text">
                                                        <span class="d-block mb-15">Drop files anywhere
                                                            to Upload</span>
                                                            <label class="button_uplode mb-15 plus-icon" for="upload">
                                                                <!-- Show the "plus" icon if not uploading -->
                                                                    <i class="lni lni-plus"></i>
                                                           
                                                            
                                                                <!-- Show loading spinner while uploading -->
                                                                <div wire:loading wire:target="uplode_img">
                                                                    <span class="visually-hidden">Loading...</span>
                                                                    <i class="fas fa-spinner fa-spin"></i>
                                                                </div>
                                                            </label>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                                  
                                                                 
                                                        <span class="main-btn d-block btn-hover">Select
                                                            File</span>
                                                        <span class="d-block">Maximum upload file size
                                                            10Mb</span>
                                                    </span>
                                                    <div class="row">
                                                    @foreach ($photos as $index => $photo)
                                                    <div class="image-container ms-2 col-6 col-md-4 col-lg-3 image_style " style="position: relative; display: inline-block;">
                                                        <!-- Display uploaded image -->
                                                        <img src="{{ $photo['url'] }}" alt="Uploaded Image" class="img-fluid ">
                                                
                                                        <!-- Close button icon -->
                                                        <div class=" bg-danger  button_close px-1  text-white " style="position: absolute; top: 0px; right: 0px;" wire:click="removePhoto({{ $index }})">
                                                        <i  class="fa-solid fa-xmark"></i>
                                                    </div>
                                                        {{-- <button  type="button" class="btn-close bg-danger  text-white " aria-label="Close" >
                                                            <!-- Optionally, you can customize the icon here -->
                                                        </button> --}}
                                                    </div>
                                                @endforeach
                                            </div>
                                                </label>
                                            </div>
                                            @error('uplode_img.*') <span class="error">{{ $message }}</span> @enderror

                                        </div>
                                  

                                        <div class="col-12">
                                            <div class="form-group mt-30">
                                                <label>Ad Description*</label>
                                                <textarea name="message" wire:model.live="Description" placeholder="Input ad description"></textarea>
                                                <div class="text-danger">@error("Description") {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                        @if ($Category == 1)


                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Modèle*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select"  wire:model.live="Model" >
                                                        @foreach($years['years'] as $year)

                                                        <option {{ ($Model==$year) ? 'selected' : '' }}
                                                            value="{{ $year }}">{{ $year }}</option>

                                                        @endforeach

                                                    </select>
                                                    <div class=" text-danger ">@error("Model") {{ $message }} @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Puissance*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select" wire:model.live="Puissance">

                                                        <option selected value="5 CV">5 CV</option>
                                                        <option value="6 CV">6 CV</option>
                                                        <option value="7 CV">7 CV</option>
                                                        <option value="8 CV">8 CV</option>
                                                        <option value="12 CV">12 CV</option>


                                                    </select>
                                                    <div class=" text-danger ">@error("Puissance") {{ $message }}
                                                        @enderror</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Type de carburant*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select" wire:model.live="TypeCar">

                                                        <option selected value="Diesel">Diesel</option>
                                                        <option value="Essence">Essence</option>
                                                        <option value="Hybride">Hybride</option>



                                                    </select>
                                                    <div class=" text-danger ">@error("TypeCar") {{ $message }}
                                                        @enderror</div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Item Condition*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select" wire:model.live="Condition">
                                                        <option selected value="Brand New">Brand New</option>
                                                        <option value="Used">Used</option>
                                                    </select>
                                                    <div class=" text-danger ">@error("Condition") {{ $message }}
                                                        @enderror</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic checkbox toggle button group">
                                                    <label class="w-25">Tags*</label>
                                                    <div class="row ">
                                                        @foreach ($tags as $tag)
                                                        <div class="ms-2 col-6 col-md-4 col-lg-3">
                                                            <input type="checkbox" class="btn-check" id="btncheck{{ $tag->TagName }}" autocomplete="off"
                                                                wire:model.live="tags_selected" value="{{ $tag->id }}">
                                                            <label style="border-radius: 30px" class="btn btn-outline-primary"
                                                                for="btncheck{{ $tag->TagName }}">{{ $tag->TagName }}</label>
                                                            </div>
                                                            @endforeach
                                                            <div class="text-danger">@error("tags_selected") {{ $message }} @enderror</div>

                                                    </div>
                                                  

                                                </div>
                                            </div>
                                        </div>
                                        {{-- {{$Title}}, {{$Category}}, {{$Price}}, {{$TypePrice}}, {{$Condition}}, {{$Puissance}}, {{$TypeCar}}, {{$Model}}, {{$Description}} --}}

                                        <div class="col-12">
                                            <div class="form-group button mb-0">

                                                <button wire:click="Step2" wire:loading.attr="disabled" type="button"
                                                    class="btn ">

                                                    <span>Next Step <i class="fa-solid fa-angles-right"></i> </span>
                                                    <span wire:loading wire:target="Step2"
                                                        class="spinner-border spinner-border-sm"
                                                        style="width: 23px; height: 23px;" role="status"
                                                        aria-hidden="true"></span>


                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Start Post Ad Step Two Content -->
                        </div>
                        <div class="tab-pane fade {{ ($next_step3) ? 'show active' : '' }}" id="nav-user-info" role="tabpanel"
                            aria-labelledby="nav-user-info-tab">
                            <!-- Start Post Ad Step Three Content -->
                            <div class="step-three-content">
                                <button wire:click="Step2" wire:loading.attr="disabled" type="button"
                                class="btn alt-btn btn-secondary mt-4">

                                <span wire:loading wire:target="Step2" class="spinner-grow spinner-grow-sm"
                                    style="width: 24px; height: 24px;" aria-hidden="true"></span>
                                <span role="status"><i class="fa-solid fa-angles-left"></i> Previous</span>


                            </button>
                        
                                <form class="default-form-style" id="stepp">
                                    <div class="row">
                                        
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input disabled readonly type="text" placeholder="Enter your name" wire:model.live="Username" style="background-color: #e3e3e3 ; cursor: not-allowed;" >
                                                <div class="text-danger">@error("Username") {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Mobile Numbe*</label>
                                                <input disabled readonly type="text" placeholder="Enter mobile number" wire:model="Phone" style="background-color: #e3e3e3 ; cursor: not-allowed;">
                                                <div class="text-danger">@error("Phone") {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-12 col-12">
                                            <div class="form-group">
                                                <label>Select City*</label>
                                                <div class="selector-head">
                                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                    <select class="user-chosen-select" wire:model.live='City' >
                                                        @foreach ($city_json as $city)
                                                        <option value="{{ $city }}">{{ $city }}</option>
                                                    @endforeach
                                                      
                                                    </select>
                                                    <div class=" text-danger ">@error("City") {{ $message }} @enderror</div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address*</label>
                                                <input  type="text" placeholder="Enter a location" wire:model='Location'>
                                                <div class="text-danger">@error("Location") {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12">
                                       
                                            <div class="form-group button mb-0">
                                                <button wire:click="Step3" wire:loading.attr="disabled" type="button"
                                                class="btn ">

                                                <span>Add Ads <i class="fa-solid fa-angles-right"></i> </span>
                                                <span wire:loading wire:target="Step3"
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
        <!-- End Post Ad Block Area -->
    </div>
</div>
{{-- @script --}}
<script>
    document.addEventListener('livewire:initialized', function () {
            Livewire.on('scrollToElement', (elementId) => {
                console.log('Received scrollToElement event:', elementId); // Debugging statement
                let element = document.querySelector(elementId);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    console.error("Element with ID '" + elementId + "' not found.");
                }
            });
        });
</script>






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

        Livewire.on('prompt-confi-deleted', function () {
            swal.fire({
                title: 'Deleted',
                text: 'Category has been deleted',
                icon: 'success',
            });
        });


    })
</script>
{{-- @endscript --}}
