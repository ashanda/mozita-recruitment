@extends('layouts.app_employee')
  
@section('content')

    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today ({{ date("d l Y") }})
                </button>
                
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
              <img src="{{ asset('images/dashboard/people.svg') }}" alt="people">
              <div class="weather-info">
                <div class="d-flex">
                  
                  <div class="ml-2">
                    @php
                      $data = userDetails();
                    @endphp
                  
                    <h4 class="location font-weight-normal">{{ $data->cityName }}</h4>
                    <h6 class="font-weight-normal">{{ $data->countryName }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Total Employees</p>
                  <p class="fs-30 mb-2">{{ employee_count_dash(Auth::user()->id) }}</p>
                  
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->

@endsection