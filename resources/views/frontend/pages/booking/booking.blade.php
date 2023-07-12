@extends('frontend.master')
@section('content')

<div>
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{url('/backend/assets/img/carousel-bg-1.jpg')}});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">Certified and Award Winning Car Repair Service Provider</h1>
                        <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4 text-center">Book For A Service</h1>
                        <form action="{{route('booking.webpage.store')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                {{-- user details --}}
                                <h6 class="text-white mb-1 text-center">User Details</h6>
                                <div class="col-6 col-sm-10">
                                    <label for="name" class="text-white">Name:</label>
                                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-6 col-sm-10">
                                    <label for="contact" class="text-white">Contact:</label>
                                    <input type="tel" name="contact" class="form-control border-0" placeholder="Your Contact" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="email" class="text-white">Email:</label>
                                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-6 col-sm-10">
                                    <label for="address" class="text-white">Address:</label>
                                    <input type="text" name="address" class="form-control border-0" placeholder="Your Address" style="height: 55px;">
                                </div>

                                {{-- car details --}}
                                <h6 class="text-white mb-1 text-center">Car Details</h6>
                                <div class="col-12 col-sm-6">
                                    <label for="name" class="text-white">Car Brand:</label>
                                    <select class="form-select border-0" name="car_brand" style="height: 55px;">
                                        <option value="">Select Car Brand</option>
                                        @foreach ($brand as $item )
                                        {{-- $singledata->column name --}}
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="car type" class="text-white">Car Type:</label>
                                    <select class="form-select border-0" name="car_type" style="height: 55px;">
                                        <option value="">Select Car Type</option>
                                        @foreach ($car_type as $item )
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="col-6 col-sm-10">
                                    <label for="reg_num" class="text-white">Car Registration Number:</label>
                                    <input type="number" name="reg_num" class="form-control border-0" placeholder="Car Registration Number" style="height: 55px;">
                                </div>

                                <div class="col-12 col-sm-6">
                                    <label for="sevrce" class="text-white">Service:</label>
                                    <select class="form-select border-0" name="service" style="height: 55px;">
                                        <option value="">Select A Service</option>
                                        @foreach ($service as $item )
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="date" class="text-white">Date:</label>
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control border-0 datetimepicker-input" type="date" name="date"
                                            placeholder="Service Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="special_request" class="text-white">Special Request:</label>
                                    <textarea class="form-control border-0" placeholder="Special Request"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
