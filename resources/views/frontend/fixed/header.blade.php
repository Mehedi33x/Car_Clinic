<div>
    {{-- Topbar Start --}}
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Car Clinic, Sector-9, Uttara, Abdullahpur, Dhaka, Bangladesh</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Sunday - Thursday | 09:00 AM - 07:00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <li><a href="{{route('webpage.support')}}" class="">Support<i class="bi bi-chat"></i></a></li>
                </div>
            </div>
        </div>
    </div>
    {{-- nav bar start --}}
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('homepage.webpage') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>Car Clinic</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('homepage.webpage') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('service.webpage') }}" class="nav-item nav-link">Services</a>
                <a href="{{ route('booking.webpage') }}" class="nav-item nav-link">Booking</a>
                <a href="{{ route('about.webpage') }}" class="nav-item nav-link">About</a>
                {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="booking.html" class="dropdown-item">Booking</a>
                    <a href="team.html" class="dropdown-item">Technicians</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> --}}
                <a href="{{ route('contact.webpage') }}" class="nav-item nav-link">Contact</a>
            </div>
            @if (Auth::guard('customers')->check())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5 d-none d-lg-block"
                        data-bs-toggle="dropdown">{{ auth('customers')->user()->name }}</a>

                    <div class="dropdown-menu fade-up m-0">
                        <a href="{{route('profile.customer')}}" class="dropdown-item">Profile</a>
                        <a href="{{ route('logout.webpage') }}" class="dropdown-item">Logout</a>
                    </div>


                </div>
            @else
                <a href="{{ route('login.webpage') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i
                        class="fa fa-user ms-3"></i></a>
            @endif
        </div>
    </nav>

</div>
