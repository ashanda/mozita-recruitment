@extends('layouts.app_admin')
  
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
                      <a class="btn btn-primary" href="/admin/user/create">Add Employee</a>
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
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011-07-25</td>
                                    <td>$170,750</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009-01-12</td>
                                    <td>$86,000</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012-03-29</td>
                                    <td>$433,060</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                  </div>
               
                </div>
              </div>
            
    
    <!-- content-wrapper ends -->
@endsection


