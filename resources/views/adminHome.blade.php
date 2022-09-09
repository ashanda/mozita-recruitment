@extends('layouts.app_admin')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>

          <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">{{ count(notificatio_read()) }} unread alerts!</span></h6>
        </div>

        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <button class="btn btn-sm btn-light bg-white " type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
              <p class="mb-4">Total Employers</p>
              <p class="fs-30 mb-2">{{ employer_count() }}</p>
              <p>10.00% (30 days)</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Total Employees</p>
              <p class="fs-30 mb-2">{{ employee_count() }}</p>
              <p>22.00% (30 days)</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  @php
  $Roles = ['2', '3'];
  $users = DB::table('users')->whereIn('type',$Roles)->get();
  @endphp

<div class="table-responsive">
<table class="table"  style="width:100%">
  <thead>
   
      <tr>
        <th>Role</th>
        <th>Email</th>
        <th>Status</th>
        <th>Last Seen</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          @if(Cache::has('user-is-online-' . $user->id))
          <label class="badge badge-success">Online</label>

          @else
          <label class="badge badge-danger">Offline</label>

          @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
</div>
<!-- content-wrapper ends -->


@endsection