<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliambulatorio Salus</title>
    <link rel="stylesheet" type= "text/css" href="{{ asset('assets/css/body.css') }}">
    <link rel="stylesheet" type= "text/css" href="{{ asset('assets/css/containers.css') }}">
    <link rel="stylesheet" type= "text/css" href="{{ asset('assets/css/structure.css') }}">
    <!--   Script -->
    <script src="{{ asset('assets/javascript/script.js') }}"></script></head>


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

</body>


</html>
