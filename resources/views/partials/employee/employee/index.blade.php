@extends('layouts.app_employee')
  
@section('content')

    <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">All Employees</h4>
                      </div>
                      <div class="pull-right text-right col-md-6">
                      <a class="btn btn-primary" href="{{ route('user_employee.create') }}">Add Employee</a>
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
                                    <th class="text-center">Job Category</th>
                                    <th class="text-center">Job Sub Category</th>
                                    <th class="text-center">Job <Title></Title></th>
                                    <th class="text-center">Candidate Name</th>
                                    <th class="text-center">Candidate Email</th>
                                    <th class="text-center">CV</th>
                                    <th class="text-center">Attachement</th>
                                    <th class="text-center">See notes history</th>
                                    <th class="text-center">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $employee)
                                <tr>
                                    <td>{{ $employee->employee_id }}</td>
                                    @php
                                       $job_parant_cat = getParentcats($employee->job_category); 
                                    @endphp
                                    <td>{{ $job_parant_cat->name }}</td>
                                    <td>{{ $employee->job_sub_category }}</td>
                                    <td>{{ $employee->job_title }}</td>
                                    <td>{{ $employee->candidate_name }}</td>
                                    <td>{{ $employee->candidate_email }}</td>
                                    <td>{{ $employee->cv }}</td>
                                    <td>{{ $employee->attachment }}</td>
                                    @php
                                       $user_notes = getUserNotes($employee->employee_id,$employee->employee_uid); 
                                    @endphp
                                    <td>{{ $user_notes->created_at }}</td>
                                    <td>
                                        <form action="{{ route('employee.destroy',$employee->id) }}" method="Post">
                                        <a class="btn btn-warning" href="{{ route('employee.show',$employee->id) }}">View</a>
                                        <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
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
            
    
    <!-- content-wrapper ends -->
@endsection


