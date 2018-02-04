<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
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
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('designnku/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('designnku/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('designnku/css/style.css')}}" rel="stylesheet">
    {{--  <link rel="stylesheet" href="{{asset('css/app.css')}}" />  --}}
    
    <link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">

    <title>
        AdminDashboard
    </title>
</head>
<body class=" scrollbar-lady-lips">
    <div id="app" >
        @yield('maoniangbody')
    </div>

</body>

<script>

</script>
  <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('designnku/js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('designnku/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('designnku/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('designnku/js/mdb.min.js')}}"></script>

    <script src="{{ asset('js/app.js') }}"></script>



  
</html>
   
              