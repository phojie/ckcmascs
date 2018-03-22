<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        //token nku ni
        window.myToken =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
<title>Automated Student Clearance</title>
<!-- plugins:css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="ckcmascs/node_modules/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="ckcmascs/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="ckcmascs/node_modules/jquery-bar-rating/dist/themes/css-stars.css">
<link rel="stylesheet" href="ckcmascs/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
{{--  <link href="{{asset('designnku/css/mdb.css')}}" rel="stylesheet">  --}}

  {{--  <link href="{{asset('designnku/css/bootstrap.min.css')}}" rel="stylesheet">  --}}
  <!-- Material Design Bootstrap -->
  <!-- Your custom styles (optional) -->
  {{--  <link href="{{asset('designnku/css/style.css')}}" rel="stylesheet">  --}}

<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="ckcmascs/css/style.css">
<link rel="stylesheet" href="style.css">

<!-- endinject -->
<link rel="shortcut icon" href="images/4.gif" />
<link rel="stylesheet" href="{{asset('css/vue-jie.min.css')}}"></link>
<link href="css/myico/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="{{asset('js/vue-jie.min.js')}}"></script>
<script src="https://unpkg.com/v-tooltip"></script>

</head>
<body  class="special-color">

    <div  id="app">
        
            @yield('maoniangbody')
        

    </div>

<script src="{{ asset('js/app.js') }}"></script>


<!-- plugins:js -->
<script src="ckcmascs/node_modules/jquery/dist/jquery.min.js"></script>
<script src="ckcmascs/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="ckcmascs/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="ckcmascs/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="ckcmascs/node_modules/chart.js/dist/Chart.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="ckcmascs/js/off-canvas.js"></script>
<script src="ckcmascs/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="ckcmascs/js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>





</html>
   
              