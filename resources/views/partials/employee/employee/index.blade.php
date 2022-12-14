@extends('layouts.app_employee')

@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row pl-3">
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
                                <th class="text-center">Action</th>
                                <th class="text-center">Employee ID</th>
                                <th class="text-center">Job Title</th>
                                <th class="text-center">Job Category</th>
                                <th class="text-center">Job Sub Category</th>
                                <th class="text-center">Job Role</th>
                                <th class="text-center">Candidate Name</th>
                                <th class="text-center">Candidate Email</th>
                                <th class="text-center">CV</th>
                                <th class="text-center">Attachement</th>
                                <th class="text-center">See notes history</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_data as $employee)
                            <tr>
                                <td>
                                    
                                        <a class="btn btn-warning" href="{{ route('user_employee.show',$employee->id) }}">View</a>
                                        <a class="btn btn-primary" href="{{ route('user_employee.edit',$employee->id) }}">Edit</a>
                                        
                                </td>
                                <td>{{ $employee->employee_id }}</td>
                                @php
                                $job_parant_cat = getParentcats($employee->job_category);
                                @endphp
                                <td>{{ $employee->job_title }}</td>
                                <td>{{ $job_parant_cat->name }}</td>
                                <td>{{ $employee->job_sub_category }}</td>
                                <td>{{ $employee->job_role }}</td>
                                <td>{{ $employee->candidate_name }}</td>
                                <td>{{ $employee->candidate_email }}</td>
                                <td>{{ $employee->cv }}</td>
                                <td>{{ $employee->attachment }}</td>
                                @php
                                $user_notes = getUserNotes($employee->employee_id,$employee->employee_uid);
                                @endphp
                                @if ($user_notes == null)
                                <td>{{ '-' }}</td> 
                                @else
                                <td>{{ $user_notes->created_at }}</td>
                                @endif

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