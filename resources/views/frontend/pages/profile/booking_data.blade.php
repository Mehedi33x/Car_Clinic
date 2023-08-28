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
        {{-- @dd($bookings) --}}
        <div class="mx-5">
            <table class="table table-bordered" style="border: 2px solid black">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Car Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Registration No.</th>
                        <th scope="col">Booked On</th>
                        <th scope="col">Serives</th>
                        <th scope="col">Status</th>
                        <th scope="col">Serive Charge</th>
                        <th scope="col">Total Payment</th>
                        <th scope="col">Due</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Action</th>



                    </tr>
                </thead>
                <tbody>

                    @foreach ($bookings as $key => $item)
                        <tr>
                            {{-- @dd($bookings) --}}

                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->car_brand }}</td>
                            <td>{{ $item->car_type }}</td>
                            <td>{{ $item->reg_num }}</td>
                            @php
                                $currDate = \Carbon\Carbon::parse()->format('d-m-Y');
                            @endphp
                            <td>{{ $currDate }}</td>
                            <td>
                                @foreach ($item->service as $data)
                                    {{-- @dd($data) --}}
                                    <p>{{ $data }}</p>
                                @endforeach
                            </td>
                            <td class="text-capitalize">{{ $item->status }}</td>
                            <td>{{ $item->cost }} BDT</td>
                            <td class="text-capitalize">{{ $item->total_payment }} BDT</td>
                            <td class="text-capitalize">{{ $item->cost - $item->total_payment }} BDT</td>
                            <td class="text-capitalize">{{ $item->payment_status }}</td>
                            <td>
                                <a href="{{ route('delete.booking.webpage', $item->id) }}" class="fa fa-trash"
                                    onclick="return confirm('Are you sure to Delete?')">Cancel</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table> <br>
        </div>


    </div>
@endsection
