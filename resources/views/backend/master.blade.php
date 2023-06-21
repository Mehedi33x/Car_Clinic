
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CarClinic</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('backend/assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{url('backend/assets/vendors/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/vendors/chartist/chartist.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('backend/assets/images/favicon.png')}}" />
  </head>
  <body>



    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
        @include('backend.fixed.header')
      <!-- partial -->



      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.fixed.sidebar')
        <!-- partial -->



        <div class="main-panel">
          @yield('content')
          <!-- content-wrapper ends -->


          <!-- partial:partials/_footer.html -->
          @include('backend.fixed.footer')
          <!-- partial -->


        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
<!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js">
    <!-- plugins:js -->
    <script src="{{url('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{url('backend/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('backend/assets/vendors/moment/moment.min.js')}}"></script>
    <script src="{{url('backend/assets/vendors/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('backend/assets/vendors/chartist/chartist.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{url('backend/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{url('backend/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
