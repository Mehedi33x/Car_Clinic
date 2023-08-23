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

            {{-- @dd(auth()->user()->id) --}}
            <form action="{{ route('update.profile', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}">
                    <div class="alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="tel" id="contact" value="{{ auth()->user()->contact }}" name="contact">
                    <div class="alert-danger">
                        {{ $errors->first('contact') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" value="{{ auth()->user()->email }}" name="email">
                    <div class="alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <div class="alert-danger">
                        {{ $errors->first('passowrd') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" value="{{ auth()->user()->address }}" name="address">
                    <div class="alert-danger">
                        {{ $errors->first('address') }}
                    </div>
                </div>


                <div class="form-group">
                    <label for="image">Image:</label>
                    <img style="height: 120px;width:90px" src="{{ url('uploads/mechanics/' . auth()->user()->image) }}"
                        alt=""><br><br>
                    <input type="file" id="image" name="image" >
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
