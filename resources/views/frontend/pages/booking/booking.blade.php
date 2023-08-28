@extends('frontend.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <script type="text/javascript" src="{{ url('backend/multiselect-dropdown.js') }}"></script>
    </head>

    <body>
        <div>
            <div class="container-fluid page-header mb-5 p-0"
                style="background-image: url({{ url('/backend/assets/img/carousel-bg-1.jpg') }});">
                <div class="container-fluid page-header-inner py-5">
                    <div class="container text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Booking</li> --}}
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
                                <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd
                                    ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt
                                    voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem.
                                    Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-primary h-100 d-flex flex-column justify-content-center p-5 wow zoomIn"
                                data-wow-delay="0.6s">
                                <h1 class="text-white mb-4 text-center">Book For A Service</h1>
                                <form action="{{ route('booking.webpage.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        {{-- user details --}}
                                        <h6 class="text-white mb-1 text-center">User Details</h6>
                                        <div class="col-6 col-sm-10">
                                            <label for="name" class="text-white">Name:</label>
                                            <input type="text" name="name" class="form-control border-0"
                                                placeholder="Your Name" style="height: 55px;"
                                                value="{{ auth('customers')?->user()?->name }}" readonly>
                                            <div class="alert-danger">
                                                {{ $errors->first('name') }}
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-10">
                                            <label for="contact" class="text-white">Contact:</label>
                                            <input type="tel" name="contact"
                                                value="{{ auth('customers')?->user()?->contact }}"
                                                class="form-control border-0" placeholder="Your Contact"
                                                style="height: 55px;">
                                            <div class="alert-danger">
                                                {{ $errors->first('contact') }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="email" class="text-white">Email:</label>
                                            <input type="email" name="email" class="form-control border-0"
                                                placeholder="Your Email" style="height: 55px;"
                                                value="{{ auth('customers')?->user()?->email }}" readonly>
                                            <div class="alert-danger">
                                                {{ $errors->first('email') }}
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-10">
                                            <label for="address" class="text-white">Address:</label>
                                            <input type="text" name="address"
                                                value="{{ auth('customers')?->user()?->address }}"
                                                class="form-control border-0" placeholder="Your Address"
                                                style="height: 55px;">
                                            <div class="alert-danger">
                                                {{ $errors->first('address') }}
                                            </div>
                                        </div>

                                        {{-- car details --}}
                                        <h6 class="text-white mb-1 text-center">Car Details</h6>
                                        <div class="col-12 col-sm-6">
                                            <label for="name" class="text-white">Car Brand:</label>
                                            <select class="form-select border-0" name="car_brand" style="height: 55px;">
                                                <option value="">Select Car Brand</option>
                                                @foreach ($brand as $item)
                                                    {{-- $singledata->column name --}}
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="car type" class="text-white">Car Type:</label>
                                            <select class="form-select border-0" name="car_type" style="height: 55px;">
                                                <option value="">Select Car Type</option>
                                                @foreach ($car_type as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>

                                        <div class="col-6 col-sm-10">
                                            <label for="reg_num" class="text-white">Car Registration Number:</label>
                                            <input type="number" name="reg_num" class="form-control border-0"
                                                placeholder="Car Registration Number" style="height: 55px;">
                                            <div class="alert-danger">
                                                {{ $errors->first('reg_num') }}
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="sevrce" class="text-white ">Service:</label>
                                            <select class="form-select border-0 selectpiker"name="service[]"
                                                style="height: 55px;" multiple multiselect-search="true" required>
                                                {{-- <option value="">Select A Service</option> --}}
                                                @foreach ($service as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 col-sm-10">
                                            <label for="cost" class="text-white">Total Cost:</label>
                                            <p class="service_charge" style="color: white"></p>
                                        </div>


                                        {{-- <div class="col-12 col-sm-8">
                                        <label for="date" class="text-white">Date:</label>
                                        <div class="date" id="date1" data-target-input="nearest">
                                            <input type="date"
                                                class="form-control border-0 datetimepicker-input" id="date" name="date"
                                                placeholder="Service Date" data-target="#date1"  style="height: 55px;">
                                        </div>
                                    </div> --}}
                                        <div class="col-12 col-sm-8">
                                            <label for="date" class="text-white">Date:</label>
                                            <div class="date">
                                                <input type="date" class="form-control border-0" name="date"
                                                    placeholder="Service Date" style="height: 55px;">
                                            </div>
                                            <div class="alert-danger">
                                                {{ $errors->first('date') }}
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="special_request" class="text-white">Special Request:</label>
                                            <textarea class="form-control border-0" placeholder="Special Request" name="special_request"></textarea>
                                        </div>
                                        {{-- <div class="d-block my-3">
                                            <label for="special_request" class="text-white">Special Request:</label>
                                            <div class="custom-control custom-radio">
                                              <input value="ssl" id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                              <label class="custom-control-label" for="credit">SSL Commerz</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                              <input value="cod" id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                              <label class="custom-control-label" for="debit">COD</label>
                                            </div>
                                        </div> --}}
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
    </body>

    </html>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $('[name="service[]"]').on('change', function() {
                const selectedOptions = $(this).val();

                $.ajax({
                    url: "{{ route('booking.charge') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        selectedOptions
                    },
                    success: function(res) {
                        const charges = $(".service_charge")
                        charges.text(`${res} BDT`)
                        charges.append(
                            `<input type="hidden" value="${res}" name="service_charges"/>`)
                    },
                })
            })



        })
    </script>
@endpush
