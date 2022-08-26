@extends('layouts.app_employer')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">All Notification</h4>
                      </div>
                      
                      </div>
                    
                    @if ($message = Session::get('success'))
                    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>success!</strong> {{ $message }}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                     </div>  
                     @endif
                    </div>
                    <div class="container">
                        
                    <div class="table-responsive">
                        <table class="table table-hover" id="table" style="width:100%">
                            <thead>
                                
                                <tr>
                                    <th class="text-center">System ID</th>
                                    <th class="text-center">Note</th>
                                    <th class="text-center">Remineder </th>
                                    
                                    <th class="text-center">Action</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($notifications_all as $employer)
                                <tr>
                                    <td>{{ $employer->system_id }}</td>
                                    <td>{{ $employer->note }}</td>
                                    <td>{{ $employer->reminder }}</td>

                                    
                                    <td>
                                        <form action="{{ route('notification.destroy',$employer->id) }}" method="Post">
                                        
                                        <a class="btn btn-primary" href="{{ route('notification.edit',$employer->id) }}">Read</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                               
                                
                            </tbody>
                        </table>
                    </div>
                  </div>
               
                </div>
              </div>
            
    </div>
    <!-- content-wrapper ends -->
@endsection


