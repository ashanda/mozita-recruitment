@extends('layouts.auth_app')
  
@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>SORRY!</h2>
                <h3 class="font-weight-light">You do not have permission to access for this page.</h3>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                @php
                  $role = Auth::user()->type
                @endphp
                @if($role == 'admin')
                  <a class="text-white font-weight-medium" href="{{ route('admin.home') }}">Back to home</a>
                @elseif ($role == 'employer')
                  <a class="text-white font-weight-medium" href="{{ route('employer.home') }}">Back to home</a>
                @elseif ($role == 'employee')
                  <a class="text-white font-weight-medium" href="{{ route('employee.home') }}">Back to home</a>
                @else
                  <a class="text-white font-weight-medium" href="{{ route('login') }}">Back to home</a>
                @endif            
                  
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white font-weight-medium text-center">Copyright &copy; 2021  All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection


