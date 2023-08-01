
@extends('backend.master')
@section('content')

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/backend/assets/css/add_form.css">
</head>
<body>

  <div class="container">

    <h2>Update Your Information</h2>

    <form action="{{route('mechanic.update',$mechanic->id)}}" method="POST" enctype="multipart/form-data">
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
             <img style="height:80px;width=80px;" class="mb-3" src="{{url('uploads/mechanics/'.$mechanic->image)}}" alt="">
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
