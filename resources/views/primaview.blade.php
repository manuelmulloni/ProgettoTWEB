
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
<main class = "main">
    <h1>Contenuto Principale</h1>
    <p>Questo è il contenuto della pagina. Il menu ad hamburger è sempre visibile nell'header.</p>
    <div class ="container"></div> <!-- Placeholder -->
</main>

<script src="../public/assets/javascript/script.js"></script>

</body>
</html>
