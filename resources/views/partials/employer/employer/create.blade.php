@extends('layouts.app_employer')

@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="row pl-3">
                    <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">Add Employer</h4>
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
                <form action="{{ route('user_employer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company name :</strong>
                                    <input type="text" name="company_name" class="form-control">
                                    @error('company_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Trading As :</strong>
                                    <input type="text" name="trading" class="form-control">
                                    @error('trading')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>NZBN :</strong>
                                    <input type="text" name="nzbn" class="form-control">
                                    @error('nzbn')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Business Industry :</strong>
                                  <input type="text" name="business_industry" class="form-control">
                                  @error('business_industry')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                           </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Branch :</strong>
                                    <input type="text" name="branch" class="form-control">
                                    @error('branch')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Branch Address:</strong>
                                  <input type="text" name="branch_address" class="form-control">
                                  @error('branch_address')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company Phone Number :</strong>
                                    <input type="text" name="company_phone" class="form-control">
                                    @error('company_phone')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company Website :</strong>
                                    <input type="text" name="website" class="form-control">
                                    @error('website')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>First Meet Up :</strong>
                                    <input type="date" name="dfcm" class="form-control">
                                    @error('dfcm')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8">

                            <div class="row">

                                <div id="dynamicAddRemoveContact">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <strong>Contact person :</strong>
                                                <input type="text" name="addMoreInputFieldsContact[0][contact_person]"
                                                    class="form-control">
                                                @error('addMoreInputFieldsContact[0][contact_person]')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Designation :</strong>
                                                <input type="text" name="addMoreInputFieldsContact[0][designation]"
                                                    class="form-control">
                                                @error('position')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 text-end">
                                            <div class="form-group add_new_item">

                                                <button type="button" name="addContact" id="add-contact"
                                                    class="btn btn-outline-primary ml-auto"><i
                                                        class="bi bi-plus-circle"></i></button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Phone Number :</strong>
                                                <input type="text" name="addMoreInputFieldsContact[0][phone]"
                                                    class="form-control">
                                                @error('addMoreInputFieldsContact[0][phone]')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Email address :</strong>
                                                <input type="email" name="addMoreInputFieldsContact[0][email]"
                                                    class="form-control">
                                                @error('addMoreInputFieldsContact[0][email]')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div id="dynamicAddRemove">
                                            <div class="row">
                                                <div class="col-xs-5 col-sm-5 col-md-5">
                                                    <div class="form-group">
                                                        <strong>Notes :</strong>
                                                        <textarea name="addMoreInputFields[0][note]"
                                                            class="form-control">
</textarea>
                                                        @error('addMoreInputFields[0][note]')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-5 col-md-5">
                                                    <div class="form-group">
                                                        <strong>Reminder :</strong>
                                                        <input type="datetime-local"
                                                            name="addMoreInputFields[0][reminder]" class="form-control">
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
