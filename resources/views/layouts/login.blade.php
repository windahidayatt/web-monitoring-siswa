<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link href=" {{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ url('/css/login.css') }}" >
    <link rel="icon" href="{{url("/img/monitoring.png")}}">

    <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    
    <title>Login</title>
    <style>
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row row-full ">
            @yield('container-login')
        </div>
    </div>
</body>
</html>
