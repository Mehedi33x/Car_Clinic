@extends('frontend.master')
@section('content')
    <div>
        <div class="container-fluid page-header mb-5 p-0"
            style="background-image: url({{ url('/backend/assets/img/carousel-bg-1.jpg') }});">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Booking List</h1>
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

    <div class="mt-3 ml-3 mr-3">
        <h2 style="font-size: 35px; margin-bottom:20px; text-align:center">Service Booking List</h2>

        <div class="mx-5">
            <table class="table table-bordered" style="border: 2px solid black">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Car Registration No.</th>
                        <th scope="col">Booked On</th>
                        <th scope="col">Serives</th>
                        <th scope="col">Serive Charge</th>
                        <th scope="col">Status</th>


                    </tr>
                </thead>
                <tbody>

                    {{-- @dd($item) --}}
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        @php
                            $currDate = \Carbon\Carbon::parse()->format('d-m-Y');
                        @endphp
                        <td>{{ $currDate }}</td>
                        <td></td>
                        <td> BDT</td>
                        <td></td>
                    </tr>
                </tbody>
            </table> <br>
        </div>


    </div>
@endsection
