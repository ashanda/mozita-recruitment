@extends('layouts.app_admin')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                      <div class="row pl-3">
<div class="pull-left text-left mb-2 col-md-6">
  <h4 class="card-title">Settings</h4>
</div>
<div class="pull-right text-right col-md-6">
<a class="btn btn-primary" href="{{ route('settings.index') }}"> Back</a>
</div>
</div>

@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('settings.update',['setting'=>1]) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>App name :</strong>
    <input type="text" name="app_name" class="form-control" >
    @error('app_name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>App Logo :</strong>
    <input type="file" name="app_logo" placeholder="Choose file" id="file" required>
    @error('app_logo')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
      <strong>App Logo Mobile :</strong>
      <input type="file" name="app_logo_mobile" placeholder="Choose file" id="file" required>
      @error('app_logo_mobile')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
      <strong>App Favicon :</strong>
      <input type="file" name="app_favicon" placeholder="Choose file" id="file" required>
      </textarea>
      @error('address')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>App Email :</strong>
    <input type="email" name="app_email" class="form-control" >
    @error('app_email')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    
      
        
          <button type="submit" class="btn btn-primary ml-3">Save</button>
</div>






</div>

</form>
</div>
</div>
</div>

</div>
<!-- content-wrapper ends -->
@endsection