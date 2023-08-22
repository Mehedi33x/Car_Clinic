@extends('backend.master')
@section('content')
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


    <div class="container">
        <h2 class="mb-3" style="text-align: center">Customer Information</h2>
        <hr>
        <div class="data-item">
            <span class="data-label">Name:</span>
            <span class="data-value">{{ $customer->name }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Email:</span>
            <span class="data-value">{{ $customer->email }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Contact:</span>
            <span class="data-value">{{ $customer->contact }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Address:</span>
            <span class="data-value">{{ $customer->address }}</span>
        </div>

        <!-- Add more data items as needed -->
    </div>
@endsection
