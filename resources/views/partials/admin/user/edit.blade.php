@extends('layouts.app_admin')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="pull-right">
                      <div class="row">
                        
                        <div class="col-12"><h4 class="card-title">Edit Users</h4> <a class="btn btn-primary float-right" value=".float-right" href="{{ route('user.index') }}" enctype="multipart/form-data"> Back</a></div>
                        
                       
                      </div>
                      
                    </div>
                    
                    @if(session('status'))
                      <div class="alert alert-success mb-1 mt-1">
                      {{ session('status') }}
                      </div>
                      @endif
                    <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                      <strong>Name:</strong>
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="name">
                      @error('name')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                      </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                      <strong>Email:</strong>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                      @error('email')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                      </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                      <strong>Password:</strong>
                      <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="Password">
                      @error('password')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                      </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                           <strong>User Type:</strong>
                           <select id="exampleFormControlSelect2" class="form-control" name="type" aria-label="Default select example">
                              @php
                              $type = $user->type;
                              @endphp
                              @if ($type == '2')
                              <option selected>Employer</option>
                              <option value="3">Employee</option>
                              @elseif ($type == '3')
                              <option selected>Employee</option>
                              <option value="2">Employer</option>
                              @else
                              <option selected>Select role</option>
                              <option value="2">Employer</option>
                              <option value="3">Employee</option>
                              @endif
                            </select>
                           @error('password')
                           <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                           @enderror
                           </div>
                           </div>
                      <button type="submit" class="btn btn-primary ml-3">Submit</button>
                      </div>
                      </form>
                  </div>
                </div>
              </div>

    </div>
    <!-- content-wrapper ends -->
@endsection




