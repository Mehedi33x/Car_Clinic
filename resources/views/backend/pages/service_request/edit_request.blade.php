@extends('backend.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f0f0;
  }

  .form-container {
    display: flex;
    width: 80%;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  .form-left, .form-right {
    flex: 1;
    padding: 20px;
  }

  .form-left {
    background-color: #f5f5f5;
  }

  .form-right {
    background-color: #fafafa;
  }

  .form-title {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .form-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .form-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
</style>
<title>Two-Sided Form</title>
</head>
<body>
<div class="form-container">
  <div class="form-left">
    <h2 class="form-title">Left Side</h2>
    <form>
      <input type="text" class="form-input" placeholder="Name">
      <input type="email" class="form-input" placeholder="Email">
      <button class="form-button">Submit</button>
    </form>
  </div>
  <div class="form-right">
    <h2 class="form-title">Right Side</h2>
    <form>
      <input type="text" class="form-input" placeholder="Username">
      <input type="password" class="form-input" placeholder="Password">
      <button class="form-button">Submit</button>
    </form>
  </div>
</div>
</body>
</html>


@endsection
