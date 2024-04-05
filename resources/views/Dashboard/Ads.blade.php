@extends('Dashboard.layouts.app')


@section('title')
    
@endsection

@section('content')
<div>
  <div class="row mt-2">
      <div class="col-lg-12">
        <div class="card-style mb-30">
          <h6 class="mb-10">List Ads</h6>
        
          <div class="table-wrapper table-responsive">
            <table class="table text-center ">
              <thead>
                <tr>
                
                  <th>
                    <h6>Title</h6>
                  </th>
                  <th>
                    <h6>Description</h6>
                  </th>
                  <th>
                    <h6>brand</h6>
                  </th>
                  <th>
                      <h6>catgaory</h6>
                  </th>
                  <th>
                    <h6>user</h6>
                  </th>
                  <th>
                      <h6>Price</h6>
                    </th>
                  <th>
                    <h6>city</h6>
                  </th>
                  <th>
                      <h6>Location</h6>
                    </th>
                 
                  <th>
                    <h6>status</h6>
                  </th>
                  <th>
                    <h6>option</h6>
                  </th>
                 
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @if ($Ads)
                      @foreach ($Ads as $Ad)
                          
                
                <tr>
                  <td class="min-width">
                    <p>{{ $Ad->Title }}</p>
                  </td>
                  <td class="min-width">
                    <p><a href="#0">{{ $Ad->Description }}</a></p>
                  </td>
                  <td class="min-width">
                    <p>{{ $Ad->brand }}</p>
                  </td>
                  <td class="min-width">
                    <p>{{ $Ad->categories->Name }}</p>
                  </td>
                  <td class="min-width">
                    <p>{{ $Ad->users->Username }}</p>
                  </td>
                  <td class="min-width">
                    <p>{{ $Ad->Price }}</p>
                  </td>
                  <td class="min-width">
                    <p>{{ $Ad->City }}</p>
                  </td>
                  <td class="min-width">
                    <p>{{ $Ad->Location }}</p>
                  </td>
                  <td class="min-width">
                      @if ( $Ad->status === 'approved' )
                      <span class="status-btn active-btn">approved</span>
                      @elseif($Ad->status === 'pending' )
                          <span class="status-btn close-btn">pending</span>
                      @else 
                      <span class="status-btn close-btn">rejected</span>
                      @endif
                  </td>
                  <td>
                    <div class="action mx-auto d-block">
                      @if ($Ad->status === 'rejected' || $Ad->status === 'pending')
                     
                      <a class="text-primary me-3" href="{{ route('approve',$Ad->id) }}">Approve</a>
                  @endif
                  
                  @if ($Ad->status === 'pending' || $Ad->status === 'approved')
                   
                      <a class="text-danger" href="{{ route('reject',$Ad->id) }}">Reject</a>

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