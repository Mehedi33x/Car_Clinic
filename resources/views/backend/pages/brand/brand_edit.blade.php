@extends('backend.master')
@section('content')
<!DOCTYPE html>
<html>
<head>
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
    input[type="file"],
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
</head>
<body>

  <div class="container">

    <h2>Enter Car Information</h2>
    {{-- @dd($brand) --}}
    <form action="{{route('update.brand',$brand->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
        <label for="name">Brand Name:</label>
        <input type="text" value="{{$brand->name}}" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        {{-- <input type="text" id="description" name="description" required> --}}
        <textarea name="description" id="description" cols="40" rows="10">{{$brand->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">Brand Status:</label>
        <select id="status" value="{{$brand->status}}" name="status" required>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>

        <div class="form-group">
             <label for="image">Image:</label>
             <td>
                <img style="width: 100px;height:120px" src="{{url('/uploads/brand',$brand->image)}}" alt="" srcset="">
             </td>
            <input type="file" id="image" name="image" >
        </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>

    </form>

  </div>

</body>
</html>


@endsection
