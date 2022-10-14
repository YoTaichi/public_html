<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    
    @include('bootstrap_css')
    @yield('head')
</head>

<body style="background-image:url(/img/background6.png); background-size:auto; background-repeat:round;">

    @yield('content')
    
    <!-- Bootstrap JavaScript Libraries -->
    @include('bootstrap_js')
</body>

</html>