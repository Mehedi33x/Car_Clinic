<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{route('user.profile')}}" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ url('/uploads/mechanics'), auth()->user()->image }}">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name text-capitalize">{{ auth()->user()->name }}</p>
                    <p class="designation text-capitalize">{{ auth()->user()->role }}</p>
                </div>

            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mechanic.list') }}">
                    <span class="menu-title">Mechanics List</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('center.list') }}">
                    <span class="menu-title">Service Center</span>
                    <i class="icon-book-open menu-icon"></i>
                </a>
            </li> --}}
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ route('service.request') }}">
                <span class="menu-title">Booking Request</span>
                <i class="icon-chart menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report') }}">
                <span class="menu-title">Reports</span>
                <i class="icon-grid menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.support') }}">
                <span class="menu-title">Support</span>
                <i class="icon-grid menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('customer.list') }}">
                <span class="menu-title">Customer List</span>
                <i class="icon-chart menu-icon"></i>
            </a>
        </li>

        @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.list') }}">
                    <span class="menu-title">User List</span>
                    <i class="icon-globe menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('service.list') }}">
                    <span class="menu-title">Service List</span>
                    <i class="icon-book-open menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('category') }}">
                    <span class="menu-title">Car Type</span>
                    <i class="icon-chart menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('brand.list') }}">
                    <span class="menu-title">Car Brands</span>
                    <i class="icon-chart menu-icon"></i>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ route('payment') }}">
                <span class="menu-title">Payment</span>
                <i class="icon-chart menu-icon"></i>
            </a>
        </li>


    </ul>
</nav>
