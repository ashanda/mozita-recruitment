@extends('layouts.app_employer')

@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row pl-3">
                    <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">All Employers</h4>
                    </div>
                    
                </div>

                
            </div>
            <div class="container">

                <div class="table-responsive">
                    <table class="table table-hover" id="table" style="width:100%">
                        <thead>

                            <tr>
                                
                                
                                <th class="text-center">Staff Name</th>
                                <th class="text-center">Company Name</th>
                                <th class="text-center">Company Phone</th>
                                <th class="text-center">Branch</th>
                                <th class="text-center">Company Website</th>
                                <th class="text-center">Notes History</th>
                                

                                


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($company_data as $employer)
                            <tr>
                                
                                
                                <td>{{ $employer->name }}</td>
                                <td>{{ $employer->company_name }}</td>
                                <td>{{ $employer->company_phone }}</td>
                                <td>{{ $employer->company_branch }}</td>
                                <td>{{ $employer->website }}</td>
                               
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