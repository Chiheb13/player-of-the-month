<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
           Pages
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        
        <li class="nav-item">
          <a href="{{ route('afficheplayer') }}" class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>players</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{ route('showtableequipe') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> teams</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{ route('showcompititiontable') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> compitition </p>
          </a>
        </li>
        
        
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Simple Link
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li>
  </ul>