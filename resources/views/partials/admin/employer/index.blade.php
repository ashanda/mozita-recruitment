@extends('layouts.app_admin')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">All Employers</h4>
                      </div>
                      <div class="pull-right text-right col-md-6">
                      <a class="btn btn-primary" href="{{ route('employer.create') }}">Add Employer</a>
                      </div>
                      </div>
                    
                    @if ($message = Session::get('success'))
                    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>success!</strong> {{ $message }}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                     </div>  
                     @endif
                    </div>
                    <div class="container">
                        
                    <div class="table-responsive">
                        <table class="table table-hover" id="table" style="width:100%">
                            <thead>
                                
                                <tr>
                                    <th class="text-center">System User Name</th>
                                    <th class="text-center">Branch</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Company Email</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Contact Person</th>
                                    <th class="text-center">Position</th>
                                    <th class="text-center">Date First Contact Made</th>
                                    <th class="text-center">See notes history</th>
                                    <th class="text-center">Action</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($data as $employer)
                                <tr>
                                    <td>{{ $employer->name }}</td>
                                    <td>{{ $employer->company_branch }}</td>
                                    <td>{{ $employer->company_name }}</td>
                                    <td>{{ $employer->company_email }}</td>
                                    <td>{{ $employer->company_address }}</td>
                                    <td>{{ $employer->contact_person }}</td>
                                    <td>{{ $employer->position }}</td>
                                    <td>{{ $employer->date_first_contact_made }}</td>
                                    @php
                                       $user_notes = getUserNotes($employer->employer_id,$employer->employer_uid); 
                                    @endphp
                                    <td>{{ $user_notes->created_at }}</td>
                                    <td>
                                        <form action="{{ route('employer.destroy',$employer->id) }}" method="Post">
                                        <a class="btn btn-warning" href="{{ route('employer.show',$employer->id) }}">View</a>
                                        <a class="btn btn-primary" href="{{ route('employer.edit',$employer->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                               
                                
                            </tbody>
                        </table>
                    </div>
                  </div>
               
                </div>
              </div>
            
    </div>
    <!-- content-wrapper ends -->
@endsection


