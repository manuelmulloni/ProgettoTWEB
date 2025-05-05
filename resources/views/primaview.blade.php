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

@include("layouts/_header")

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
        <h2>Registrazione</h2>
        <form id="registrationForm">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrati</button>
        </form>
    </div>
</div>



<!--   Script -->
<script src="../public/assets/javascript/script.js"></script>

</body>
</html>
