<div>
    <div class="form-elements-wrapper mt-4 ms-2">
        <div class="row">
            <div class="col-lg-10 m-auto ">
                <div class="card-style mb-30">
                    @if ($UpdateCatagory_input)
                    <h6 class="mb-25">Update categories</h6>
                    <div class="input-style-3">
                        <input  type="text" placeholder="catagory Name" wire:model.blur="UpdateCatagory_input"
                            wire:dirty.class="red"> <span class="icon"><i class="fa-solid fa-layer-group"></i></span>
                        <div>
                            @error('UpdateCatagory_input') <span class="error text-danger ">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="mb-3">
                        <label  {{ $Newicon ? 'hidden' : '' }} for="exampleFormControlInput1"
                            class="custom-file-input-button"><i class="fa-solid fa-images"></i></label>
                        <input wire:model="Newicon" type="file" class="custom-file-input form-control"
                            id="exampleFormControlInput1">
                        @if($OldIcon)
                        <div class=" d-flex  justify-content-start ">
                            <p>
                                <span class="status-btn active-btn">Old</span>
                              <img class="image_icon" src="{{ Storage::url($OldIcon) }}" alt=""></p>
                           
                            @if ($Newicon)
                            <p>
                                <span class="status-btn success-btn">New</span>
                                  <img class="image_icon " src="{{ $Newicon->temporaryUrl() }}" alt="">

                            </p>
                                
                            <p wire:click='close_icon' class="btn-close"></p>
                            <div wire:loading wire:target="close_icon">Uploading...</div>
                            @endif
                        </div>
                        @endif
                        <div class=" text-danger ">@error('Newicon') {{ $message }} @enderror</div>
                    </div> 
                    <button wire:click="UpdateCategorie" type="button" class="btn btn-success mb-4 button_hover"
                    wire:loading.attr="disabled" wire:target="UpdateCategorie">
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                    </span>
                    <span wire:loading.remove>
                        Update Categorie
                    </span>
                </button>
                    @else 
                    <h6 class="mb-25">add categories</h6>

                    <!-- end input -->
                    <div class="input-style-3">
                        <input type="text" placeholder="catagory Name" wire:model.blur="catagory_input"
                            wire:dirty.class="red"> <span class="icon"><i class="fa-solid fa-layer-group"></i></span>
                        <div>
                            @error('catagory_input') <span class="error text-danger ">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="mb-3">
                        <label {{ $icon ? 'hidden' : '' }} for="exampleFormControlInput1"
                            class="custom-file-input-button"><i class="fa-solid fa-images"></i></label>
                        <input wire:model="icon" type="file" class="custom-file-input form-control"
                            id="exampleFormControlInput1">
                        @if($icon)
                        <div class=" d-flex  justify-content-start ">
                            <img class="image_icon " src="{{ $icon->temporaryUrl() }}" alt="">
                            <p wire:click='close_icon' class="btn-close"></p>
                            <div wire:loading wire:target="close_icon">Uploading...</div>


                        </div>
                        @endif
                        <div class=" text-danger ">@error('icon') {{ $message }} @enderror</div>
                    </div>
                    <button wire:click="AddCategorie" wire:loading.attr="disabled"  type="button" class="btn btn-success mb-4 button_hover"
                    >
                    <span  wire:loading wire:target="AddCategorie,icon">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                    </span>
                    <span >
                         Add Categorie
                    </span>
                </button>
                    @endif
                    

                   



                    <!-- end input -->
                </div>
            </div>
            <div class="col-lg-10 m-auto " >
                <div class="card-style mb-30" >
                    <h6 class="mb-10">List Categories</h6>

                    <div class="table-wrapper table-responsive " >
                        <table class="table text-center  align-items-center " id="paginated-posts">
                            <thead>
                                <tr>
                                    <th>
                                        <h6>icon</h6>
                                    </th>
                                    <th>
                                        <h6>title</h6>
                                    </th>

                                    <th>
                                        <h6>Action</h6>
                                    </th>
                                </tr>
                                <!-- end table row-->
                            </thead>
                            <tbody >
                                @if ($categories)
                                @foreach ($categories as $categorie)


                                <tr  >
                                    <td>
                                        <div class="employee-image img-fluid mx-auto d-block  ">
                                            <img class="" src="{{ asset( $categorie->icon) }}" alt="{{ $categorie->Name }} Icon">
                                        </div>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $categorie->Name }}</p>
                                    </td>


                                    <td>
                                        <div class="action mx-auto d-block ">
                                            <button wire:click='EditCategorie({{ $categorie->id }})' class=" text-success me-2">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button wire:click='DeleteCategorie({{ $categorie->id }})' class="text-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h1>no data</h1>
                                @endif
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>

                </div>
                {{ $categories->links(data: ['scrollTo' => '#paginated-posts']) }}
            </div>
        </div>
    </div>
</div>
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


