@extends('layouts.app_employee')

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
            <a class="btn btn-primary" href="{{ route('user_employee.index') }}"> Back</a>
          </div>
        </div>

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
          {{ session('status') }}
        </div>
        </div>
         @endif 
                    <form action="{{ route('user_employee.update',$id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <strong>Job Title :</strong>
                              <input type="text" name="job_name" class="form-control" value="{{ $employee->job_title }}" required>
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
                              <strong>Job Sub Catogry :</strong>
                              <select name="subcategory" id="subcategory" class="form-control input-sm" required>
                               
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <strong>Job Role :</strong>
                              <input type="text" name="job_role" class="form-control" value="{{ $employee->job_role }}" required>
                              @error('job_role')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <strong>Candidate Name :</strong>
                              <input type="text" name="candidate_name" class="form-control" value="{{ $employee->candidate_name }}" required>
                              @error('candidate_name')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <strong>Candidate Email:</strong>
                              <input type="email" name="candidate_email" class="form-control" value="{{ $employee->candidate_email }}" required>
                              @error('candidate_email')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <strong>CV upload :</strong>


                              <input type="file" name="cv_file" placeholder="Choose file" id="file" value="{{ $employee->cv }}">
                              <input type="hidden" name="cv_file_update" value="{{ $employee->cv }}">
                              @error('cv_file')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <strong>Attachment :</strong>


                              <input type="file" name="attachment" placeholder="Choose file" value="{{ $employee->attachment }}" id="file">
                              <input type="hidden" name="attachment_update" value="{{ $employee->attachment }}">
                              @error('attachment')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                          <div id="dynamicAddRemove2">
                            @php
                              $notes = getUserNotesAll($employee->employee_id,$employee->employee_uid);
                              $x=10000000;
                            @endphp
                            @foreach ($notes as $note)
                            <input type="hidden" name="unq_id" value="{{ $note->note_id }}">
                            <div class="row">
                              <div class="col-xs-10 col-sm-10 col-md-10">
                                <div class="form-group">
                                  <input type="hidden" name="addMoreInputFields[{{ $x }}][note_row_id]" value="{{ $note->id }}">
                                  <strong>Company/Expert Area and Remarks :</strong>
                                  <input type="text" name="addMoreInputFields[{{ $x }}][note]" class="form-control" value="{{ $note->note }}">
                                  @error('addMoreInputFields[{{ $x }}][note]')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                              
                              <div class="col-xs-2 col-sm-2 col-md-2 text-end">
                                <div class="form-group add_new_item">
                                  @if ($x==10000000)
                                  <button type="button" name="add" id="add-note2" class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle"></i>
                                  </button>
                                  @else
                                          <button class="btn btn-outline-primary ml-auto">
                                            <a href="{{ route('employee_note.delete',$note->id) }}">
                                              <i class="bi bi-dash-circle"></i></a>
                                          </button>

                                  @endif
                                </div>
                              </div>
                              
                            </div>
                            @php
                            $x++;
                          @endphp
                          @endforeach
                          </div>


                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>











                      </div>

                    </form>
                  </div>
                </div>
              </div>

            </div>
            <!-- content-wrapper ends -->
            @endsection
