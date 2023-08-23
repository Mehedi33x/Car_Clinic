@extends('backend.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }

            .container {
                max-width: 600px;
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
        <div class="container">
            <h2 class="mb-3" style="text-align: center">User Profile</h2>
            <a href="{{route('edit.profile')}}" class="btn btn-success">Edit</a>
            <hr>
            <div class="row">
                <div class="data-item mx-auto">
                    <img style="height: 180px;width:150px" src="{{url('/uploads/mechanics/'.auth()->user()->image)}}" alt="">
                </div>
            </div>
            <div class="data-item">
                <span class="data-label">Name:</span>
                <span class="data-value">{{ auth()->user()->name }}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Email:</span>
                <span class="data-value">{{ auth()->user()->email }}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Contact:</span>
                <span class="data-value">{{ auth()->user()->contact }}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Address:</span>
                <span class="data-value">{{ auth()->user()->address }}</span>
            </div>
            <!-- Add more data items as needed -->
        </div>
    </body>

    </html>
@endsection
