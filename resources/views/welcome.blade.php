@extends('layouts.app')

@section('content')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ URL::asset('css/welcome.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
     <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('js/bootstrap.js') }}" ></script>
        
     
    
        <!--link href="css/welcome.css" rel="stylesheet" type="text/css"-->
    </head>
    <body>
    <div id="app">
        <example-component></example-component>
    </div>
    </body>
</html>

    <div id="app"> <!-- ID: 'app' -->
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Contact me</h2>
                    </div>
                    <div class="card-body">
                        <!--
                            Our component:
                        -->
                        <contact-form></contact-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

