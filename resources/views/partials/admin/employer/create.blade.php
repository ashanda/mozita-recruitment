@extends('layouts.app_admin')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                      <div class="row">
<div class="pull-left text-left mb-2 col-md-6">
  <h4 class="card-title">Add User</h4>
</div>
<div class="pull-right text-right col-md-6">
<a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
</div>
</div>

@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Email">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Password:</strong>
<input type="password" name="password" class="form-control" placeholder="Password">
@error('password')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
 <strong>User Type:</strong>
 <select class="form-control" id="exampleFormControlSelect2" name="type" aria-label="Default select example">
    <option selected>Open this select menu</option>
    <option value="2">Employer</option>
    <option value="3">Employee</option>
    
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