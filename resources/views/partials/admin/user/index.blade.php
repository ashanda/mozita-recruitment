@extends('layouts.app_admin')

@section('content')

<div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row pl-3">
          <div class="pull-left text-left mb-2 col-6">
            <h4 class="card-title">All Users</h4>
          </div>
          <div class="pull-right text-right col-6">
            <a class="btn btn-primary" href="/admin/user/create">Add System User</a>
          </div>
        </div>


      </div>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
            <th width="280px">Action</th>
              <th>S.No</th>
              <th>Name</th>
              <th>Role</th>
              <th>Email</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $users)
            <tr>
              <td>
                <form action="{{ route('user.destroy',$users->id) }}" method="POST" enctype="multipart/form-data">
                  <a class="btn btn-primary" href="{{ route('user.edit',$users->id) }}">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
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