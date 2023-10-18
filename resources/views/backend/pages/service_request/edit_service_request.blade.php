@extends('backend.master')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        {{-- <link rel="stylesheet" href="/backend/assets/css/add_form.css"> --}}
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f1f1f1;
            }

            .container {
                max-width: 400px;
                margin: 0 auto;
                background-color: #fff;
                padding: 30px;
                border-radius: 5px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                margin-bottom: 30px;
                color: #333;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #666;
                font-weight: bold;
            }


            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="number"],


            select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f7f7f7;
                color: #333;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <h2>Enter Service Request Information</h2>
            <form action="{{ route('update.request', $booking->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <hr>
                <h5 style="text-align: center;">Assign Section</h5>
                <div class="form-group">
                    <label for="assign_to">Assign To:</label>
                    <select id="assign_to" name="assign_to" required>
                        @foreach ($mechanic as $data)
                            <option value="{{ $data->name }}">{{ $data->name }}</option>
                        @endforeach


                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" value="{{ $booking->status }}" required>
                        <option value="pending">Pending</option>
                        <option value="in progress">In Progress</option>
                        <option value="done">Done</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Total Bill:</label>
                    <input type="number" min="0" id="name" name="cost" value="{{ $booking->cost }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="name">Payment:</label>
                    <input type="number" min="0" id="payment" name="payment" value="">
                </div>


                <hr>
                {{-- @dd($booking) --}}
                <h5 style="text-align:center;">Customer Information</h5>
                <div class="form-group">
                    <label for="name">Customer Name:</label>
                    <input type="text" id="name" name="name" value="{{ $booking->name }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Contact:</label>
                    <input type="tel" id="contact" name="contact" value="{{ $booking->contact }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="email" id="name" name="email" value="{{ $booking->email }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="{{ $booking->address }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Car Brand Name:</label>
                    <input type="text" id="name" name="car_brand" value="{{ $booking->car_brand }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Car Type:</label>
                    <input type="text" id="name" name="car_type" value="{{ $booking->car_type }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Car Registration No:</label>
                    <input type="text" id="name" name="reg_num" value="{{ $booking->reg_num }}" required>
                </div>
                {{-- <div class="form-group">
                    <label for="name">Selected Service:</label>
                    <input type="text" id="name" name="service" value="" required>
                </div> --}}
                <div class="form-group">
                    <label for="name">Cost:</label>
                    <input type="number" min="0" id="name" name="cost" value="{{ $booking->cost }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="name">Special Request:</label>
                    <input type="text" id="name" name="special_request" value="{{ $booking->special_request }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="name">Booking Date:</label>
                    <div>
                        @php
                            $cur_date = \Carbon\Carbon::parse($booking->date)->format('d-m-Y');
                        @endphp
                        <p>{{ $cur_date }}</p>

                        {{-- <input type="date" name="date" id="date" value="{{$cur_date}}"> --}}
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>

            </form>

        </div>

    </body>

    </html>
@endsection
