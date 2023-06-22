
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

    <h2>Update Your Information</h2>

    <form action="{{route('mehcanic.update',$mechanic->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" value="{{$mechanic->name}}" name="name"  required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" value="{{$mechanic->email}}" name="email"  required>
      </div>

      <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="tel" id="contact" value="{{$mechanic->contact}}"  name="contact"  required>
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" value="{{$mechanic->address}}" name="address" required>
      </div>

      <div class="form-group">
        <label for="status">Working Status:</label>
        <select id="status" value="{{$mechanic->status}}" name="status" required>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>

        </select>
      </div>
        <div class="form-group">
             <label for="image">Image:</label>
             <img  style="height: 80px;width=80px;" class="mb-3"   src="{{asset('images/mechanics/'.$mechanic->image)}}" alt="">
            <input type="file" id="image" name="image" required>
        </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>

    </form>

  </div>

</body>
</html>


@endsection
