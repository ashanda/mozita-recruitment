@extends('layouts.auth_app')

@section('content')
<div class="auth-form-light text-left py-5 px-4 px-sm-5">
    <div class="brand-logo">
      <img src="{{ asset('images/logo.svg') }}" alt="logo">
    </div>
    <h4>Hello! let's get started</h4>
    <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group">
        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Username" required autocomplete="email" autofocus>

        @error('email')
          <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
          </span>
        @enderror
        
      </div>
      <div class="form-group">
        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
       
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
            {{ __('SIGN IN') }}
        </button>
        
      </div>
      <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
          <label class="form-check-label text-muted">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
           
            Keep me signed in
          </label>
        </div>
        @if (Route::has('password.request'))
        <a class="auth-link text-black" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
        
      </div>
    
      
    </form>
  </div>

@endsection
