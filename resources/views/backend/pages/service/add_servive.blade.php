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

    <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
        <label for="name">Service Name:</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="email">Description:</label>
        <textarea type="text" name="description" id="" cols="40" rows="10" ></textarea>
      </div>
      <div class="form-group">
        <label for="cost">Service Cost:</label>
        <input type="number" min="1" name="cost" required>
      </div>
      <div class="form-group">
        <label for="status">Service Status:</label>
        <select id="status" name="status" required>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
      <div class="form-group">
        <label for="image">Image:</label>
       <input type="file" id="image" name="image">
    </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>

    </form>

  </div>
</body>
</html>
@endsection
