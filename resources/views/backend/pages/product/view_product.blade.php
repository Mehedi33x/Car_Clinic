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

    <body>
        <div class="container">
            <h2 class="mb-3" style="text-align: center">Product Information</h2>
            <hr>
            <div class="data-item">
                <span class="data-label">Image:</span>
                <img style="height: 150px; width:130px" src="{{url('/uploads/product', $products->image)}}"  alt="">
            </div>
            <div class="data-item">
                <span class="data-label">Name:</span>
                <span class="data-value">{{$products->name}}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Category:</span>
                <span class="data-value">{{$products->catData->name}}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Price:</span>
                <span class="data-value">{{$products->price}}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Stock:</span>
                <span class="data-value">{{$products->stock}}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Description:</span>
                <span class="data-value">{{$products->description}}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Status:</span>
                <span class="data-value">{{$products->status}}</span>
            </div>
            <!-- Add more data items as needed -->
        </div>
    </body>
@endsection
