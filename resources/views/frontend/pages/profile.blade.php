<div class="col-lg-9 col-md-8 col-12">
    <div class="main-content">
        <!-- Start Profile Settings Area -->
        <div class="dashboard-block mt-0 profile-settings-block">
            <h3 class="block-title">Profile Settings</h3>
            <div class="inner-block">
                <div class="image">
                    <img src="{{ asset('images/' . Auth::user()->image) }}" alt="Profile Image">
                </div>
                <form class="profile-setting-form" action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <input name="image" class="mb-4" type="file">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label>Username*</label>
                                <input name="name" value="{{ old('name', $User->name) }}" type="text" placeholder="@username">
                                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label>Phone*</label>
                                <input value="{{ old('phone', $User->phone) }}" name="phone" type="text" placeholder="+212 06...">
                                @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group button mb-0">
                                <button type="submit" class="btn">
                                    <span>Update Profile</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        <!-- End Profile Settings Area -->
        <!-- Start Password Change Area -->
        <form action="{{ route('change-password') }}" method="post">
            @csrf
            <div class="dashboard-block password-change-block">
                <h3 class="block-title">Change Password</h3>
                <div class="inner-block">
                    <div class="default-form-style">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Current Password*</label>
                                    <input name="current_password" type="password" placeholder="Enter old password">
                                    @error('current_password') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>New Password*</label>
                                    <input name="new_password" type="password" placeholder="Enter new password">
                                    @error('new_password') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Retype Password*</label>
                                    <input name="password_confirmation" type="password" placeholder="Retype password">
                                    @error('password_confirmation') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button mb-0">
                                    <button type="submit" class="btn">
                                        <span>Update Password</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- End Password Change Area -->
    </div>
</div>
{{-- 
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
</script> --}}
@if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Profile updated successfully!',
            text: '{{ Session::get('error') }}',
        });
    </script>
@endif

