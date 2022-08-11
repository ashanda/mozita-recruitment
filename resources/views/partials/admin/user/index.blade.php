@extends('layouts.app_admin')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Users</h4>
                    @if ($message = Session::get('success'))
                    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>success!</strong> {{ $message }}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                     </div>  
                     @endif
                    </div>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                            <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $users)
                            <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td> 
                            <td>
                            @if ($users->type == 'employer')
                            <label class="badge badge-info">{{ $users->type }}</label>
                            @else
                            <label class="badge badge-success">{{ $users->type }}</label>
                            @endif
                            </td>
                            <td>{{ $users->email }}</td>
                            <td>
                                
                            <form action="{{ route('user.destroy',$users->id) }}" method="POST" enctype="multipart/form-data">
                            <a class="btn btn-primary" href="{{ route('user.edit',$users->id) }}">Edit</a>
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
            
    
    <!-- content-wrapper ends -->
@endsection


