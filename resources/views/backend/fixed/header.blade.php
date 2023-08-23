<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex align-items-center">
        <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h3 class="m-0 text-primary"><i class="fa fa-car me-3"></i>Car Clinic</h3>
        </a>

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
      <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome dashboard!</h5>
      <ul class="navbar-nav navbar-nav-right ml-auto">
        <form class="search-form d-none d-md-block" action="#">
          <i class="icon-magnifier"></i>
          <input type="search" class="form-control" placeholder="Search Here" title="Search here">
        </form>

          {{-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
              <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{url('backend/assets/images/faces/face10.jpg')}}" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                <p class="font-weight-light small-text"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{url('backend/assets/images/faces/face12.jpg')}}" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                <p class="font-weight-light small-text"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{url('backend/assets/images/faces/face1.jpg')}}" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                <p class="font-weight-light small-text"> The meeting is cancelled </p>
              </div>
            </a>
          </div>
        </li> --}}

        <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle ml-2" src="{{url('/uploads/mechanics/'.auth()->user()->image)}}" alt="Profile image"> <span class="font-weight-normal"> {{auth()->user()->name}} </span></a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="{{url('backend/assets/images/faces/face8.jpg')}}" alt="Profile image">
              <p class="mb-1 mt-3">{{auth()->user()->name}}</p>
              <p class="font-weight-light text-muted mb-0">{{auth()->user()->email}}</p>
            </div>

            <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>
