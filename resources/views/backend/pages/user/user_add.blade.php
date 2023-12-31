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

            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <div class="alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <div class="alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <div class="alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="tel" id="contact" name="contact" required>
                    <div class="alert-danger">
                        {{ $errors->first('contact') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                    <div class="alert-danger">
                        {{ $errors->first('address') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" required>
                    <div class="alert-danger">
                        {{ $errors->first('image') }}
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
