@extends('layouts.app_admin')

@section('content')

<div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <div class="row px-3 pb-3">
          <div class="pull-left text-left mb-2 col-6">
            <h4 class="card-title">Read</h4>
          </div>
          <div class="pull-right text-right col-6">
            <a class="btn btn-primary" href="{{ route('notification.index') }}"> Back</a>
          </div>
        </div>

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
          {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('notification.update', $notifications_ones->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Employee ID : {{ $notifications_ones->system_id }}</strong>
                  <!-- <input type="text" name="system_id" class="form-control" value="{{ $notifications_ones->system_id }}" readonly> -->
                  @error('system_id')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Reminder : {{ $notifications_ones->reminder }}</strong>
                  <!-- <input type="text" name="reminder" class="form-control" value="{{ $notifications_ones->reminder }}" readonly> -->
                  @error('address')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Note :</strong>
                  <textarea name="note" class="form-control" readonly>{{ $notifications_ones->note }}
                  </textarea>
                  @error('note')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              




              <button type="submit" class="btn btn-primary">Read</button>

            </div>









          </div>

        </form>
      </div>
    </div>
  </div>

</div>
<!-- content-wrapper ends -->
@endsection