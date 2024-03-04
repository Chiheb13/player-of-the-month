
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
  <li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route('home') }}" class="nav-link">Home</a>
  </li>
  
</ul>


<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  <!-- Messages Dropdown Menu -->
  <li class="nav-item dropdown">
      
      <div class="dropdown-divider"></div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf <!-- Include the CSRF token for security -->
    </form>
    
    <a href="#" class="dropdown-item dropdown-footer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
  </li>
</ul> 