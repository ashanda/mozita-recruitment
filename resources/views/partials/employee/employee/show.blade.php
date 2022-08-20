@extends('layouts.app_employee')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                      <div class="row">
<div class="pull-left text-left mb-2 col-md-6">
  <h4 class="card-title">Add Employee</h4>
</div>
<div class="pull-right text-right col-md-6">
<a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
</div>
</div>

@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif

@csrf
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Job Name  :</strong>
    <input type="text" name="job_name" class="form-control" value="{{ $employee->job_title }}" readonly>
    @error('job_name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <strong>Job Category  :</strong>
    <div class="form-group">
        <input type="text" name="job_name" class="form-control" value="{{ $employee->job_category }}" readonly>
    </div>
    
    <div class="form-group">
       
        <input type="text" name="job_name" class="form-control" value="{{ $employee->job_sub_category }}" readonly>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
      <strong>Candidate Name  :</strong>
      <input type="text" name="candidate_name" class="form-control" value="{{ $employee->candidate_name }}" readonly>
      @error('candidate_name')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Candidate Email:</strong>
    <input type="email" name="candidate_email" class="form-control" value="{{ $employee->candidate_email }}" readonly>
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
    <div class= "col-xs-8 col-sm-8 col-md-8">
        <div id="dynamicAddRemove">
          <div class="row">
          <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
            <strong>Remarks :</strong>
            <textarea name="addMoreInputFields[0][note]" class="form-control" >
            </textarea>
            @error('addMoreInputFields[0][note]')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="form-group">
              <strong>Reminder :</strong>
              <input type="datetime-local" name="addMoreInputFields[0][reminder]" class="form-control" >
              @error('addMoreInputFields[0][reminder]')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
              </div>
              </div>
              <div class="col-xs-1 col-sm-1 col-md-1">
                <div class="form-group add_new_item">
                
                  <button type="button" name="add" id="add-note" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i></button>
                </div>
              </div>
          </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary ml-3">Save</button>
        </div>











</div>


</div>
</div>
</div>

</div>
<!-- content-wrapper ends -->
@endsection