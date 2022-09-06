@extends('layouts.app_admin')

@section('content')

<div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <div class="row pl-3">
          <div class="pull-left text-left mb-2 col-6">
            <h4 class="card-title">Add Employee</h4>
          </div>
          <div class="pull-right text-right col-6">
            <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
          </div>
        </div>

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
          {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Job Name :</strong>
                  <input type="text" name="job_name" class="form-control" required>
                  @error('job_name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Job Category :</strong>
                <div class="form-group">
                  <select name="category" id="category" class="form-control input-sm" required>
                    @foreach($s as $k)
                    <option value="{{ $k['id'] }}">{{ $k['name'] }}</option>
                    @endforeach
                    {{--<option value="Dance And Music">Dance And Music</option>--}}
                  </select>
                </div>

                <div class="form-group">
                  <strong>Job Role :</strong>
                  <select name="subcategory" id="subcategory" class="form-control input-sm">
                    <option value=""></option>
                  </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Candidate Name :</strong>
                  <input type="text" name="candidate_name" class="form-control" required>
                  @error('candidate_name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Candidate Email:</strong>
                  <input type="email" name="candidate_email" class="form-control" required>
                  @error('candidate_email')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>CV upload :</strong>
                  <input type="file" name="cv_file" placeholder="Choose file" id="file" required>
                  @error('cv_file')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Attachment :</strong>
                  <input type="file" name="attachment" placeholder="Choose file" id="file">
                  @error('attachment')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
              <div id="dynamicAddRemove2">
                <div class="row">
                  <div class="col-xs-10 col-sm-10 col-md-10">
                    <div class="form-group">
                      <strong>Remarks :</strong>
                      <textarea name="addMoreInputFields[0][note]" class="form-control">
            </textarea>
                      @error('addMoreInputFields[0][note]')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xs-2 col-sm-2 col-md-2 text-end">
                    <div class="form-group add_new_item">

                      <button type="button" name="add" id="add-note2" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i></button>
                    </div>
                  </div>
                </div>
              </div>


              <button type="submit" class="btn btn-primary">Save</button>
            </div>











          </div>

        </form>
      </div>
    </div>
  </div>

</div>
<!-- content-wrapper ends -->
@endsection