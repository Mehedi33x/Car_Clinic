@extends('backend.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }

            .container {
                max-width: 900px;
                margin: 20px auto;
                background-color: #ffffff;
                padding: 20px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
            }

            .data-item {
                margin-bottom: 15px;
            }

            .data-label {
                font-weight: bold;
            }

            .data-value {
                margin-left: 10px;
            }
        </style>
    </head>

    <body>
        {{-- @dd($booking) --}}
        <div class="container">
            <div id="serviceRequest">
                <h2 class="mb-3" style="text-align: center">Booking Information</h2>
                <hr>
                <div class="data-item">
                    <span class="data-label">Booking Id:</span>
                    <span class="data-value">{{ $booking->booking_code }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Name:</span>
                    <span class="data-value">{{ $booking->name }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Contact:</span>
                    <span class="data-value">{{ $booking->contact }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Email:</span>
                    <span class="data-value">{{ $booking->email }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Address:</span>
                    <span class="data-value">{{ $booking->address }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Car Brand Name:</span>
                    <span class="data-value">{{ $booking->car_brand }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Car Type:</span>
                    <span class="data-value">{{ $booking->car_type }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Address:</span>
                    <span class="data-value">{{ $booking->address }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Car Registration No:</span>
                    <span class="data-value">{{ $booking->reg_num }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Services:</span>
                    <span class="data-value">
                        @foreach ($booking->service as $data)
                            <p>{{ $data }}</p>
                        @endforeach
                    </span>
                </div>
                <div class="data-item">
                    <span class="data-label">Service Charge:</span>
                    <span class="data-value">{{ $booking->cost }} BDT</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Total Payment:</span>
                    <span class="data-value">{{ $booking->total_payment }} BDT</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Due:</span>
                    <span class="data-value">{{ $booking->cost - $booking->total_payment }} BDT</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Special Request:</span>
                    <span class="data-value">{{ $booking->special_request }}</span>
                </div>
                <hr>
                <div class="data-item">
                    <span class="data-label">Booking Assign To:</span>
                    <span class="data-value text-capitalize">{{ $booking->assign }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Booking Status:</span>
                    <span class="data-value text-capitalize">{{ $booking->status }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Booking Date:</span>
                    @php
                        $currDate = \Carbon\Carbon::parse($booking->date)->format('d-m-Y');
                    @endphp
                    <span class="data-value">{{ $currDate }}</span>
                </div>
            </div>
            <div>
                <button onclick="printDiv('serviceRequest')" class="btn btn-success ">Print</button>

            </div>
            <script>
                function printDiv(divId) {
                    var printContents = document.getElementById(divId).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
            </script>
    </body>

    </html>
@endsection
