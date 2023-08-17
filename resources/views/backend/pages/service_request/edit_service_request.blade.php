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
            input[type="num"],


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

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div class="form-group">
                    <label for="name">Selected Service:</label>
                    <input type="text" id="name" name="service" value="" required>
                </div>
                <div class="form-group">
                    <label for="name">Cost:</label>
                    <input type="num" min="0" id="name" name="cost" value="{{ $booking->cost }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="name">Special Request:</label>
                    <input type="text" id="name" name="special_request" value="{{ $booking->name }}" required>
                </div>
                {{-- <div class="form-group">
                    <label for="name">Cost:</label>
                    <input type="text" id="name" name="cost" required>
                </div>
                <div class="form-group">
                    <label for="name">Cost:</label>
                    <input type="text" id="name" name="cost" required>
                </div> --}}
                <div class="form-group">
                    <label for="name">Date:</label>
                    <input type="text" id="name" name="cost" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>

            </form>

        </div>

    </body>

    </html>
@endsection
