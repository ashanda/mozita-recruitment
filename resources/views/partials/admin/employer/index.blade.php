@extends('layouts.app_admin')

@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row pl-3">
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
                                <th class="text-center">Action</th>
                                <th class="text-center">Employer ID</th>
                                <th class="text-center">Company Name</th>
                                <th class="text-center">Trading As</th>
                                <th class="text-center">NZBN</th>
                                <th class="text-center">Branch</th>
                                <th class="text-center">Company Phone</th>
                                <th class="text-center">Company Website</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">First Meet up</th>
                                <th class="text-center">See notes history</th>



                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $employer)
                            <tr>
                                <td>
                                    <form action="{{ route('employer.destroy',$employer->id) }}" method="Post">
                                        <a class="btn btn-warning" href="{{ route('employer.show',$employer->id) }}">View</a>
                                        <a class="btn btn-primary" href="{{ route('employer.edit',$employer->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $employer->employer_id }}</td>
                                <td>{{ $employer->company_name }}</td>
                                <td>{{ $employer->trading }}</td>
                                <td>{{ $employer->nzbn }}</td>
                                <td>{{ $employer->company_branch }}</td>
                                <td>{{ $employer->company_phone }}</td>
                                <td>{{ $employer->website }}</td>
                                @php
                                $user_contact =  getUserContactAll($employer->employer_id,$employer->employer_uid);
                                @endphp
                                @if ($user_contact == null)
                                <td>{{ '-' }}</td>
                                @else
                                <td class="hoverModel">{{ 'View Contact Details' }}
                                    <div class="hover_model">
                                        <table class="table">
                                            <tr>
                                               <th>Conatct Person</th>
                                               <th>Designation</th>
                                               <th>Phone</th>
                                               <th>Email</th>
                                            </tr>
                                            @foreach ( $user_contact as $contact )
                                            <tr>
                                                <td>{{ $contact->contact_person }}</td>
                                                <td>{{ $contact->designation }}</td>
                                                <td>{{ $contact->phone_number }}</td>
                                                <td>{{ $contact->email }}</td>
                                            </tr>
                                            @endforeach
                                            

                                        </table>
                                    </div>
                                </td>
                                @endif
                                <td>{{ $employer->date_first_contact_made }}</td>
                                @php
                                $user_notes = getUserNotes($employer->employer_id,$employer->employer_uid);
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

</div>
<!-- content-wrapper ends -->
@endsection