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
            <li><a href="#">Registrazione</a></li>
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

<!-- Footer -->
<footer>
    <div class="footer-content">
        <p>&copy; 2023 Poliambulatorio Salus. Tutti i diritti riservati.</p>
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Termini di Servizio</a></li>
            <li><a href="#">Contatti</a></li>
        </ul>
    </div>

    <div class="footer-content">
       <h1>Info Sito</h1>
        <p>Per prenotare al sito è necessario compilare il form di registrazione che si trova nella toggle-bar.</p>
    </div>
</footer>


<script src="../public/assets/javascript/script.js"></script>

</body>
</html>
