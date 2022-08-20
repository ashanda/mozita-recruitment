<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('employee.home') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#employee" aria-expanded="false" aria-controls="tables">
        <i class="bi bi-person-lines-fill menu-icon"></i>
        <span class="menu-title">Employees</span>
        <i class="menu-arrow"></i>
      </a>
      
      <div class="collapse" id="employee" style="">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link " href="{{ route('user_employee.index') }}">All Employees</a></li>
          <li class="nav-item"> <a class="nav-link " href="">Job Category</a></li>
        </ul>
      </div>
    </li>
    
    
    
    
   
  </ul>
</nav>