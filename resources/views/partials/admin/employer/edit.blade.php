@extends('layouts.app_admin')

@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="row pl-3">
                    <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">Edit Employer</h4>
                    </div>
                    <div class="pull-right text-right col-md-6">
                        <a class="btn btn-primary" href="{{ route('employer.index') }}"> Back</a>
                    </div>
                </div>

                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif

                <form action="{{ route('employer.update', $id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company name :</strong>
                                    <input type="text" name="company_name" class="form-control"
                                        value="{{ $employer->company_name }}">
                                    @error('company_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Trading As :</strong>
                                  <input type="text" name="trading" class="form-control" value="{{ $employer->position }}">
                                  @error('trading')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>NZBN :</strong>
                                  <input type="text" name="nzbn" class="form-control" value="{{ $employer->position }}">
                                  @error('nzbn')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Branch :</strong>
                                    <input type="text" name="branch" class="form-control"
                                        value="{{ $employer->company_branch }}">
                                    @error('branch')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Company Phone Number :</strong>
                                  <input type="text" name="company_phone" class="form-control" value="{{ $employer->position }}">
                                  @error('company_phone')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Company Website :</strong>
                                  <input type="text" name="website" class="form-control" value="{{ $employer->position }}">
                                  @error('website')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                            
                            
                            
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>First Meet Up :</strong>
                                    <input type="date" name="dfcm" class="form-control"
                                        value="{{ $employer->date_first_contact_made }}">
                                    @error('dfcm')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <div id="dynamicAddRemove">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-5 col-md-5">
                                        <div class="form-group">
                                            <strong>Notes :</strong>
                                            <textarea name="addMoreInputFields[0][note]" class="form-control">
    </textarea>
                                            @error('addMoreInputFields[0][note]')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5">
                                        <div class="form-group">
                                            <strong>Reminder :</strong>
                                            <input type="datetime-local" name="addMoreInputFields[0][reminder]"
                                                class="form-control">
                                            @error('addMoreInputFields[0][reminder]')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 text-end">
                                        <div class="form-group add_new_item">

                                            <button type="button" name="add" id="add-note"
                                                class="btn btn-outline-primary"><i
                                                    class="bi bi-plus-circle"></i></button>
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
