<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}"> 
              <i class="bi bi-person menu-icon"></i>
              <span class="menu-title">Roles</span>
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('employer.index') }}" >
              <i class="bi bi-people menu-icon"></i>
              <span class="menu-title">Employers</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#employee" aria-expanded="false" aria-controls="tables">
              <i class="bi bi-person-lines-fill menu-icon"></i>
              <span class="menu-title">Emplyees</span>
              <i class="menu-arrow"></i>
            </a>
            
            <div class="collapse" id="employee" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link " href="{{ route('employee.index') }}">All Employees</a></li>
                <li class="nav-item"> <a class="nav-link " href="{{ route('categories.index') }}">All Job Category</a></li>
                <li class="nav-item"> <a class="nav-link " href="{{ route('categories.create') }}">Add Job Category</a></li>
                <li class="nav-item"> <a class="nav-link " href="/admin/sub_create">Add Sub Job Category</a></li>
              </ul>
            </div>
          </li>
          
          
          
          
          <li class="nav-item" style="display:none ;">
            <a class="nav-link" href="{{ route('settings.index') }}">
              <i class="bi bi-gear menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
        </ul>
      </nav>