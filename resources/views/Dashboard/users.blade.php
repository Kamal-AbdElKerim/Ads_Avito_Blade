@extends('Dashboard.layouts.app')


@section('title')
    
@endsection

@section('content')
<div>
  <div class="row mt-2">
      <div class="col-lg-12">
        <div class="card-style mb-30">
          <h6 class="mb-10">List Users</h6>
        
          <div class="table-wrapper table-responsive">
            <table class="table text-center ">
              <thead>
                <tr>
                
                  <th>
                    <h6>Name</h6>
                  </th>
                  <th>
                    <h6>Email</h6>
                  </th>
                  <th>
                    <h6>phone</h6>
                  </th>
                  <th>
                    <h6>Status</h6>
                  </th>
                  <th>
                    <h6>Action</h6>
                  </th>
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @if ($users)
                      @foreach ($users as $user)
                          
                
                <tr>
                  <td class="min-width">
                    <p>{{ $user->name }}</p>
                  </td>
                  <td class="min-width">
                    <p><a href="#0">{{ $user->email }}</a></p>
                  </td>
                  <td class="min-width">
                    <p>{{ $user->phone }}</p>
                  </td>
                  <td class="min-width">
                      @if ( $user->deleted_at == null )
                      <span class="status-btn active-btn">Active</span>
                      @else 
                      <span class="status-btn close-btn">Inactive</span>
                      @endif
                  </td>
                  <td>
                    <div class="action mx-auto d-block">
                      @if ($user->deleted_at == null)
                
                        <a class="text-danger" href="{{ route('block_user',$user->id) }}">  <i class="fa-solid fa-user-slash"></i></a>
                        @else 
                      
                        <a class="text-primary" href="{{ route('block_user',$user->id) }}">  <i class="fa-solid fa-user-slash"></i></a>

                      @endif
                  
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
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
</div>
@endsection