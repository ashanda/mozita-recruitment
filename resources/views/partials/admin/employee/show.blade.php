@extends('layouts.app_admin')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                      <div class="row pl-3">
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
<form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
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
        <strong>Job Category :</strong>
    <div class="form-group">
        <input type="text" name="job_name" class="form-control" value="{{ $employee->job_category }}" readonly>
    </div>
    
    <div class="form-group">
    <strong>Job Sub Catogry :</strong>
        <input type="text" name="job_name" class="form-control" value="{{ $employee->job_sub_category }}" readonly>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Job Role :</strong>
        <input type="text" name="job_role" class="form-control" value="{{ $employee->job_role }}" readonly>
        @error('job_role')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
      <strong>Candidate Name :</strong>
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
      <a href="{{ asset('upload/cv/'.$employee->cv) }}" download>
        Download
      </a> 
      @error('cv_file')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Attachment :</strong>
        <a href="{{ asset('upload/attachment/'.$employee->attachment) }}" download>
          Download
        </a> 
        
        @error('attachment')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        </div>
        </div>
    </div>  
    <div class= "col-xs-8 col-sm-8 col-md-8">
        <div id="dynamicAddRemove">
          @foreach ($notes as $note )
            
          
          <div class="row">
          <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
            <strong>Remarks :</strong>
            <input type="text" name="addMoreInputFields[0][note]" class="form-control" value="{{ $note->note }}" readonly>
            
            @error('addMoreInputFields[0][note]')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            
              
          </div>
          @endforeach
        </div>
        
        
        
        </div>











</div>

</form>
</div>
</div>
</div>

</div>
<!-- content-wrapper ends -->
@endsection