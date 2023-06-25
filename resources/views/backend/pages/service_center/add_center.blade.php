
@extends('backend.master')
@section('content')

<!DOCTYPE html>
<html>
<head>
  <title>Form Example</title>
  <style>
    /* CSS styles for the form */
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

    input[type="tel"],
    input[type="text"],
    input[type="email"],
    input[type="file"],
    input[type="password"],
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

    <h2>Enter Your Information</h2>

    <form action="{{route('center.store')}}" method="POST">
      @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="tel" id="contact" name="contact" required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
      </div>

        {{-- <div class="form-group">
             <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>
        </div> --}}
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>

    </form>

  </div>

</body>
</html>


@endsection
