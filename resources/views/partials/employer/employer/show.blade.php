@extends('layouts.app_employer')

@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="row pl-3">
                    <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">View Employer</h4>
                    </div>
                    <div class="pull-right text-right col-md-6">
                        <a class="btn btn-primary" href="{{ route('user_employer.index') }}"> Back</a>
                    </div>
                </div>

                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif


                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Company name :</strong>
                                <input type="text" name="company_name" class="form-control"
                                    value="{{ $employer->company_name }}" readonly>
                                @error('company_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Trading As :</strong>
                              <input type="text" name="trading" class="form-control"
                                  value="{{ $employer->trading }}" readonly>
                              @error('trading')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>NZBN :</strong>
                              <input type="text" name="nzbn" class="form-control"
                                  value="{{ $employer->nzbn }}" readonly>
                              @error('nzbn')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Business Industry :</strong>
                            <input type="text" name="business_industry" class="form-control" value="{{ $employer->business_industry }}" readonly>
                            @error('business_industry')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                     </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Branch :</strong>
                              <input type="text" name="branch" class="form-control" value="{{ $employer->company_branch }}" readonly>
                              @error('branch')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Branch Address:</strong>
                            <input type="text" name="branch_address" class="form-control" value="{{ $employer->branch_address }}" readonly>
                            @error('branch_address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Company Phone Number :</strong>
                              <input type="text" name="company_phone" class="form-control"
                                  value="{{ $employer->company_phone }}" readonly>
                              @error('company_phone')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Company Website :</strong>
                              <input type="text" name="website" class="form-control"
                                  value="{{ $employer->website }}" readonly>
                              @error('website')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>First meet up :</strong>
                                <input type="date" name="dfcm" class="form-control"
                                    value="{{ $employer->date_first_contact_made }}" readonly>
                                @error('dfcm')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                      
                      <div class="row">

                                <div id="dynamicAddRemoveContact">
                                  @foreach ($contacts as $contact)
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Contact person :</strong>
                                                <input type="text" name="addMoreInputFields[0][contact_person]"
                                                    class="form-control" value="{{ $contact->contact_person  }}" readonly>
                                                @error('addMoreInputFields[0][contact_person]')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Designation :</strong>
                                                <input type="text" name="addMoreInputFields[0][position]"
                                                    class="form-control" value="{{ $contact->designation  }}" readonly>
                                                @error('position')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Phone Number :</strong>
                                                <input type="text" name="addMoreInputFields[0][phone]"
                                                    class="form-control" value="{{ $contact->phone_number  }}" readonly>
                                                @error('addMoreInputFields[0][phone]')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Email address :</strong>
                                                <input type="email" name="addMoreInputFields[0][email]"
                                                    class="form-control" value="{{ $contact->email  }}" readonly>
                                                @error('addMoreInputFields[0][email]')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div id="dynamicAddRemove">
                            @foreach ($notes as $note)


                            <div class="row">
                                <div class="col-xs-5 col-sm-5 col-md-5">
                                    <div class="form-group">
                                        <strong>Notes :</strong>
                                        <input type="text" name="addMoreInputFields[0][note]" class="form-control"
                                            value="{{ $note->note  }}" readonly>
                                        @error('addMoreInputFields[0][note]')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5">
                                    <div class="form-group">
                                        <strong>Reminder :</strong>
                                        <input type="datetime-local" name="addMoreInputFields[0][reminder]"
                                            class="form-control" value="{{ $note->remind_me }}" readonly>
                                        @error('addMoreInputFields[0][reminder]')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>



                    </div>




                  </div>



                </div>
            </div>
                </div>


            </div>
        </div>
    </div>

</div>
<!-- content-wrapper ends -->
@endsection
