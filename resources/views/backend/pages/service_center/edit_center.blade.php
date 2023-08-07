@extends('backend.master')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Form Example</title>
        <link rel="stylesheet" href="/backend/assets/css/add_form.css">
    </head>

    <body>

        <div class="container">

            <h2>Enter Your Information</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" value="{{ $center->name }}" name="name" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="tel" id="contact" value="{{ $center->contact }}" name="contact" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" value="{{ $center->email }}" name="email" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" value="{{ $center->address }}" name="address" required>
                </div>

                {{-- <div class="form-group">
                    <label for="status">Service Status:</label>
                    <select id="status" name="status" value="" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="image">Image:</label>
                    <img style="width: 80px; height:80px" src="{{ url('/images/center', $center->image) }}" alt="">
                    <br>
                    <input type="file" id="image" name="image">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>

            </form>

        </div>

    </body>

    </html>
@endsection
