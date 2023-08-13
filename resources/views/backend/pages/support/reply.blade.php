@extends('backend.master')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 700px;
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
    <div class="mx-6 my-6 " class="container">
        <h1 style="text-align: center">Reply</h1>

        <form action="{{ route('send.reply') }}" method="post" class="container">
            @csrf
            <input type="hidden" value="{{ $id }}" name="message_id">
            <div class="form-group">
                <label for="message">Reply:</label>
                {{-- <input type="text" id="description" name="description" required> --}}
                <textarea name="message" id="message" cols="70" rows="20"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>
@endsection
