<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliambulatorio Salus</title>
    <link rel="stylesheet" href="../public/assets/css/body.css">
    <link rel="stylesheet" href="../public/assets/css/containers.css">
    <link rel="stylesheet" href="../public/assets/css/structure.css">
</head>
<body>

<header>
    <a href="#" class="logo">Sito Minimal</a> <!-- Logo/Nome sito -->

    <div class ="container">
        <a href="{{route('dipartimenti')}}"> Dipartimenti</a>
    </div>

    <!-- Icona Hamburger (sempre visibile) -->
    <button class="hamburger-icon" aria-label="Apri menu" aria-expanded="false">
        ≡
    </button>

    <!-- Menu -->
    <nav class="mobile-menu">
        <ul>
            <li><a href="#">Login</a></li>
            <li><a href="#" id="openRegisterModal">Registrazione</a></li> <!-- cambiato per modal-->
        </ul>
    </nav>
</header>

<!-- Contenuto della pagina (esempio) -->
<main>
    <h1>Informazioni principali</h1>
    <p>Il poliambulatorio Salus si occupa di</p>
    <h1>Recapiti</h1>
    <p>Telefono: 123456789</p>
    <p>Email:salus@salus.com</p>
    <h1>Posizione</h1>
    <p>Vediamo</p>
</main>

@include("layouts/_footer")

<!-- Modal di registrazione -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>
</div>

<script src="../public/assets/javascript/script.js"></script>

</body>
</html>
