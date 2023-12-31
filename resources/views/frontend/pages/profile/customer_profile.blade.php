@extends('frontend.master')
@section('content')
    <div>
        <div class="container-fluid page-header mb-5 p-0"
            style="background-image: url({{ url('/backend/assets/img/carousel-bg-1.jpg') }});">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">

                            <li>
                                <a href="{{ route('profile.customer') }}" class="mx-3 text-white active"
                                    aria-current="page">Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('booking.list') }}" class="mx-3 text-white active"
                                    aria-current="page">Booking Details</a>
                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="bg-primary h-100 d-flex flex-column justify-content-center p-5 wow zoomIn">
                <h1 class="text-white mb-4 text-center">User Information</h1>

                <div class="col-6 col-sm-10">
                    <a href="{{ route('edit.customer.profile') }}" class="btn btn-success mt-2">+ Edit Profile</a> <br> <br>
                    <label for="name" class="text-white">Name:</label>
                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name"
                        style="height: 55px;" value="{{ auth('customers')?->user()?->name }}" readonly>
                </div>
                <br>
                <div class="col-12 col-sm-10">
                    <label for="email" class="text-white">Email:</label>
                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email"
                        style="height: 55px;" value="{{ auth('customers')?->user()?->email }}" readonly>
                </div><br>
                <div class="col-12 col-sm-10">
                    <label for="contact" class="text-white">Contact:</label>
                    <input type="tel" name="contact" class="form-control border-0" placeholder="" style="height: 55px;"
                        value="{{ auth('customers')?->user()?->contact }}" readonly>
                </div><br>
                <div class="col-12 col-sm-10">
                    <label for="address" class="text-white">Address:</label>
                    <input type="text" name="address" class="form-control border-0" placeholder="" style="height: 55px;"
                        value="{{ auth('customers')?->user()?->address }}" readonly>
                </div><br>
            </div>
        </div>
    @endsection
