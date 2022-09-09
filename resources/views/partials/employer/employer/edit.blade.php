@extends('layouts.app_employer')

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
                        <a class="btn btn-primary" href="{{ route('user_employer.index') }}"> Back</a>
                    </div>
                </div>

                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif

                <form action="{{ route('user_employer.update', $id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company name :</strong>
                                    <input type="text" name="company_name" class="form-control"
                                        value="{{ $employer->company_name }}">
                                        <input type="hidden" name="employer_id" class="form-control"
                                        value="{{ $employer->employer_id }}">
                                    @error('company_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Trading As :</strong>
                                    <input type="text" name="trading" class="form-control"
                                        value="{{ $employer->trading }}">
                                    @error('trading')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>NZBN :</strong>
                                    <input type="text" name="nzbn" class="form-control"
                                        value="{{ $employer->nzbn }}">
                                    @error('nzbn')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Business Industry :</strong>
                                  <input type="text" name="business_industry" class="form-control" value="{{ $employer->business_industry }}">
                                  @error('business_industry')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                           </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Branch :</strong>
                                    <input type="text" name="branch" class="form-control" value="{{ $employer->company_branch }}">
                                    @error('branch')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Branch Address:</strong>
                                  <input type="text" name="branch_address" class="form-control" value="{{ $employer->branch_address }}">
                                  @error('branch_address')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company Phone Number :</strong>
                                    <input type="text" name="company_phone" class="form-control"
                                        value="{{ $employer->company_phone }}">
                                    @error('company_phone')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Company Website :</strong>
                                    <input type="text" name="website" class="form-control"
                                        value="{{ $employer->website }}">
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
                            <div class="row">

                                <div id="dynamicAddRemoveContact">
                                  @php
                                    $contacts = getUserContactAll($employer->employer_id,$employer->employer_uid);
                                    $i=100000;
                                  @endphp
                                  @foreach ($contacts as $contact)
                                  <input type="hidden" name="unq_id" value="{{ $contact->unq_id }}">
                                    <div class="row">

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <input type="hidden" name="addMoreInputFieldsContact[{{ $i }}][row_id]" value="{{ $contact->id }}">
                                            
                                            <div class="form-group">
                                                <strong>Contact person :</strong>
                                                <input type="text" name="addMoreInputFieldsContact[{{ $i }}][contact_person]"
                                                    class="form-control" value="{{ $contact->contact_person }}">
                                                @error('contact_person')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Designation :</strong>
                                                <input type="text" name="addMoreInputFieldsContact[{{ $i }}][designation]"
                                                    class="form-control" value="{{ $contact->designation }}">
                                                @error('position')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 text-end">
                                            <div class="form-group add_new_item">
                                                @if ($i==100000)
                                                <button type="button" name="addContact" id="add-contact"
                                                class="btn btn-outline-primary ml-auto"><i
                                                    class="bi bi-plus-circle"></i></button>
                                                @else
                                                
                                                    
                                                    <button class="btn btn-outline-primary ml-auto"><a href="{{ route('user_contact.destroy',$contact->id) }}"><i
                                                        class="bi bi-dash-circle"></i></a></button>
                                                
                                                
                                                @endif
                                                
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Phone Number :</strong>
                                                <input type="text" name="addMoreInputFieldsContact[{{ $i }}][phone]"
                                                    class="form-control" value="{{ $contact->phone_number }}">
                                                @error('phone')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Email address :</strong>
                                                <input type="email" name="addMoreInputFieldsContact[{{ $i }}][email]"
                                                    class="form-control" value="{{ $contact->email }}">
                                                @error('email')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                      $i++;
                                    @endphp
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div id="dynamicAddRemove">
                                        @php
                                        $notes = getUserNotesAll($employer->employer_id,$employer->employer_uid);
                                        $x=10000000;
                                        @endphp
                                        @foreach ($notes as $note)
                                            <div class="row">
                                                <div class="col-xs-5 col-sm-5 col-md-5">
                                                    <input type="hidden" name="addMoreInputFields[{{ $x }}][note_row_id]" value="{{ $note->id }}">
                                                    <div class="form-group">
                                                        <strong>Notes :</strong>
                                                        <input type="text" name="addMoreInputFields[{{ $x }}][note]"
                                                            class="form-control" value="{{ $note->note }}">
    </textarea>
                                                        @error('addMoreInputFields[{{ $x }}][note]')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-5 col-md-5">
                                                    <div class="form-group">
                                                        <strong>Reminder :</strong>
                                                        <input type="datetime-local"
                                                            name="addMoreInputFields[{{ $x }}][reminder]" class="form-control" value="{{ $note->remind_me }}">
                                                        @error('addMoreInputFields[{{ $x }}][reminder]')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xs-2 col-sm-2 col-md-2 text-end">
                                                    <div class="form-group add_new_item">
                                                        @if ($x==10000000)
                                                        <button type="button" name="add" id="add-note"
                                                            class="btn btn-outline-primary"><i
                                                                class="bi bi-plus-circle"></i></button>
                                                                @else
                                                                <button class="btn btn-outline-primary ml-auto"><a href="{{ route('user_note.destroy',$note->id) }}"><i
                                                                    class="bi bi-dash-circle"></i></a></button>

                                                            @endif                                                                
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                      $x++;
                                    @endphp
                                    @endforeach
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
