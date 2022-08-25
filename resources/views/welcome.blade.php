@extends('layouts.auth_app')

@section('content')
<div class=" container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel w-100  documentation">
        <div class="content-wrapper">
          <div class="container-fluid">
            
            <div class="row pt-5 mt-5">
              <div class="col-12 pt-5 text-center">
                <i class="text-primary mdi mdi-file-document-box-multiple-outline display-1"></i>
                <h2 class="text-primary font-weight-light mt-5">
                    Mozita Recruitment System 
                  
                </h2>
                <div class="row justify-content-center">
            
                    <div class=" pt-5" >
                      <a class="btn btn-primary" href="/login"><i class="ti-lock"></i> Login</a>
                    </div>
                    
                  
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?php echo date("Y"); ?>.  <a href="https://yogeemedia.com/" target="_blank">Yogeemedia</a> . All rights reserved.
        
      </div>
    </footer>
        <!-- partial -->
      </div>
    </div>
  </div>

@endsection
