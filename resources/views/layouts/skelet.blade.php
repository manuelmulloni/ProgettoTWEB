<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliambulatorio Salus</title>
    @routes
    <link rel="stylesheet" type= "text/css" href="{{ asset('assets/css/body.css') }}">
    <link rel="stylesheet" type= "text/css" href="{{ asset('assets/css/containers.css') }}">
    <link rel="stylesheet" type= "text/css" href="{{ asset('assets/css/structure.css') }}">
    <link rel="stylesheet" type= "text/css" href="{{ asset('assets/css/custom.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2e1e0ffb29.js" crossorigin="anonymous" data-auto-replace-svg="nest"></script>
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
</head>


<body>

<header>
    <!-- Layout Header-->
    @include('layouts/_header')

</header>

<main>
    <!-- Layout main content -->

    @yield('content')

</main>

<footer>
    <!-- Layout footer -->
    @include('layouts/_footer')
</footer>



@include('layouts.timed_notif')

</body>

<script src="{{ asset('assets/js/header.js') }}"></script>

</html>