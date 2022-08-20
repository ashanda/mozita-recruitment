@extends('layouts.app_admin')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                      <div class="row">
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
<form action="{{ route('settings.update',$data->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>App name :</strong>
    <input type="text" name="app_name" class="form-control" value="{{ $data->app_name }}">
    @error('app_name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>App Logo :</strong>
    <img src="{{ asset('upload/setting/'.$data->app_logo) }}" alt="" style="border-radius: 50%;" width="100" height="100">
    <br>
    <input type="file" name="app_logo" placeholder="Choose file" id="file"  value="{{ $data->app_logo }}" >
    @error('app_logo')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
      <strong>App Logo Mobile :</strong>
      <img src="{{ asset('upload/setting/'.$data->app_logo_mobile) }}" alt="" style="border-radius: 50%;" width="100" height="100">
      <br>
      <input type="file" name="app_logo_mobile" placeholder="Choose file"  value="{{ $data->app_logo_mobile }}" id="file" >
      @error('app_logo_mobile')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
      <strong>App Favicon :</strong>
      <img src="{{ asset('upload/setting/'.$data->app_favicon) }}" alt="" style="border-radius: 50%;" width="100" height="100">
      <br>
      <input type="file" name="app_favicon" placeholder="Choose file"  value="{{ $data->app_favicon }}" id="file" >
      </textarea>
      @error('address')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>App Email :</strong>
    <input type="email" name="app_email" class="form-control" value="{{ $data->app_email }}">
    @error('app_email')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    
      
        
          <button type="submit" class="btn btn-primary ml-3">update</button>
</div>






</div>

</form>
</div>
</div>
</div>

</div>
<!-- content-wrapper ends -->
@endsection