<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulatorio Salus</title>
    <link rel="stylesheet" href="../public/assets/css/body.css">
    <link rel="stylesheet" href="../public/assets/css/containers.css">
    <link rel="stylesheet" href="../public/assets/css/structure.css">
</head>
<body>
    @include("layouts/_header")
    <main>

        <div class="container">
            <h1>Dipartimenti</h1>
            <p>Il nostro poliambulatorio offre una vasta gamma di dipartimenti per soddisfare le tue esigenze sanitarie.</p>
            <ul>
                <li><a href="{{route('cardiologia')}}">Cardiologia</a></li>
                <li><a href="{{ route('dermatologia') }}">Dermatologia</a></li>
                <li><a href="{{ route('oculistica') }}">Oculistica</a></li>
                <li><a href="">Ortopedia</a></li>
                <li><a href="">Pediatria</a></li>
                <li><a href="">Radiologia</a></li>
            </ul>
        </div>
    </main>
