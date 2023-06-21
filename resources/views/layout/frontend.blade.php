<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin side | {{$title}}    </title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{url('app.css')}}">

    <script src="{{url('app.js')}}"></script>
    
</head>
<body>

<header class="w3-padding">

    <h1 class="w3-text-red">Admin page</h1>
    <h2>Go to use <a href="https://product-scanner.vitacheung.ca/">Product Scanner</a>!</h2>

</header>

<hr>

@yield('content')

<hr>

<footer class="w3-padding">

    Admin page | 
    Copyright {{date('Y')}}
    <!-- <a href="#">Facebook</a> | 
    <a href="#">Instagram</a> -->

    <br>



</footer>

</body>
</html>