<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{url('backend/assets/images/faces/face8.jpg')}}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Allen Moreno</p>
            <p class="designation">Administrator</p>
          </div>
          <div class="icon-container">
            <i class="icon-bubbles"></i>
            <div class="dot-indicator bg-danger"></div>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Dashboard</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <span class="menu-title">Dashboard</span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('mechanic.list')}}">
          <span class="menu-title">Mechanics List</span>
          <i class="icon-layers menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('center.list')}}">
          <span class="menu-title">Service Center</span>
          <i class="icon-book-open menu-icon"></i>
        </a>
      </li>

      <li class="nav-item nav-category"><span class="nav-link">Pages</span></li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartist.html">
          <span class="menu-title">Customer List</span>
          <i class="icon-chart menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.list')}}">
          <span class="menu-title">User List</span>
          <i class="icon-globe menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('service.list')}}">
          <span class="menu-title">Service List</span>
          <i class="icon-book-open menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartist.html">
          <span class="menu-title">Car Type</span>
          <i class="icon-chart menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartist.html">
          <span class="menu-title">Payment</span>
          <i class="icon-chart menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <span class="menu-title">Reports</span>
          <i class="icon-grid menu-icon"></i>
        </a>
      </li>

    </ul>
  </nav>
