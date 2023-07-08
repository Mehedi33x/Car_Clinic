
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('backend/auth/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{url('backend/auth/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('backend/auth/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{url('backend/auth/css/style.css')}}">

    <title>Car Clinic
    </title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{url('backend/auth/images/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
            </div>
            <form action="{{route('admin.do.login')}}" method="POST">
                @csrf
              <div class="form-group first">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>

              </div>

              {{-- <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
              </div> --}}

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="{{url('backend/auth/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('backend/auth/js/popper.min.js')}}"></script>
    <script src="{{url('backend/auth/js/bootstrap.min.js')}}"></script>
    <script src="{{url('backend/auth/js/main.js')}}"></script>
  </body>
</html>
