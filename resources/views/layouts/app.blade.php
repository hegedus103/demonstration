
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">
      <!--meta id="_token" value="{{ csrf_token() }}"--> 
        <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/sajat.js') }}" ></script>
      <script src="{{ asset('js/bootstrap.js') }}" ></script>
      <!--script src="{{ mix('js/app.js') }}"></script-->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Fonts -->
     <link rel="stylesheet/less" type="text/css" href="styles.less">
       <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!--link rel="stylesheet" href="/assets/css/sweetalert.css"-->

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
     <!--script src="less.js" type="text/javascript"></script-->    
   
      <!--script src="{{ mix('js/app.js') }}"></script-->
     <!--script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script-->
    <!-- Fonts -->

  
    
        <title>@yield('title')</title>
    </head>
    <body>
        @include('sweet::alert')

       <div class="container">
            
            @yield('fomenu')
            
        </div>

        <div class="container">
            
            @yield('content')
            
        </div>
         <div class="container">
            
            @yield('hatter')
            
        </div>
    </body>
</html>