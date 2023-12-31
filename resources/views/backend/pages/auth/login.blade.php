<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('backend/login/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #toast-container>.toast-error {
            background-color: #BD362F;
        }
        .toast-success {
            background-color: green;
        }
        .toast-info {
            background-color: blue;
        }
        .toast-warning {
            background-color:yellow;
        }
    </style>
</head>

<body>

    <img class="wave" src="{{ url('backend/login/img/wave.png') }}">
    <div class="container">
        <div class="img">
            <img src="{{ url('backend/login/img/bg.svg') }}">
        </div>
        <div class="login-content">
            <form action="{{ route('admin.do.login') }}" method="POST">
                @csrf
                <img src="{{ url('backend/login/img/avatar.svg') }}">
                <h2 class="title">Sign In</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn" value="Login">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('backend/login/js/main.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>

</html>
