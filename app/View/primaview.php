<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliambulatorio Salus</title>
    <style>
        /* Stile body */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Stile per il menu mobile */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2E8B57;
            color: white;
            padding: 10px 20px;
            position: relative;
        }

        /* Stile per il logo */
        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        /* Stile per information nell'header */
        .information a{
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            margin: 0 20px;
        }

        /* Stile la barra di navigazione */
        .nav-links {
            flex-direction: column;
            align-items: flex-start;
            background-color: #2E8B57;
            position: absolute;
            top: 60px;
            right: 20px;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            display: none;
        }

        /* Stile per i link di navigazione in desktop */
        .nav-links.show {
            display: flex;
        }

        /* Stile per gli elementi nella barra di navigazione */
        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 5px 0;
        }

        /* Stile per i link di navigazione al passaggio del mouse */
        .mobile-nav-toggle {
            font-size: 30px;
            cursor: pointer;
            user-select: none;
        }

        /* Stile per la sezione di prenotazione */
        .booking-section {
            background-color: #f4f4f4;
            padding: 40px 20px;
            text-align: center;
        }

        /* Stile per il titolo della sezione di prenotazione */
        .booking-section h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        /* Stile per il form di prenotazione */
        .booking-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }


        /* Stile per gli input e il bottone del form di prenotazione */
        .booking-form input,
        .booking-form select,
        .booking-form button {
            padding: 10px;
            width: 300px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .booking-form button {
            background-color: #2E8B57;
            color: white;
            cursor: pointer;
        }

        .booking-form button:hover {
            background-color: #245d41;
        }

        /* Stile per il footer */
        footer {
            background-color: #2E8B57;
            color: white;
            padding: 20px;
            text-align: center;
        }


        /* Stile per il form del footer */
        footer form input,
        footer form button {
            padding: 10px;
            width: 250px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        footer form button {
            background-color: #245d41;
            color: white;
            cursor: pointer;
        }

        /* Stile per il bottone del form del footer al passaggio del mouse */
        footer form button:hover {
            background-color: #1f4a32;
        }
    </style>
</head>

<body>

<!-- Inizio header -->
<header>
    <!-- Logo del Poliambulatorio -->
    <div class="logo">Poliambulatorio Salus</div>

    <div class="information">
        <a href="informazioni.php">Informazioni</a>
        <a href="dipartimenti.php">Dipartimenti</a>
        <a href="sito.php">Sito</a>

    </div>

    <!-- Bottone menu mobile -->
    <div class="mobile-nav-toggle" onclick="toggleMobileNav()">☰</div>

    <!-- Link di navigazione -->
    <nav class="nav-links" id="nav-links">
        <a href="acceddi.php">Accedi</a>

    </nav>
</header>

<!-- Sezione Prenotazione -->
<section class="booking-section">
    <h2>Prenota una Visita</h2>

    <!-- Form di prenotazione -->
    <form class="booking-form" action="prenotazione.php" method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="telefono" placeholder="Numero di Telefono" required>
        <select name="specialista" required>
            <option value="">Seleziona Specialista</option>
            <option value="cardiologo">Cardiologo</option>
            <option value="dermatologo">Dermatologo</option>
            <option value="ortopedico">Ortopedico</option>
        </select>
        <input type="date" name="data" required>
        <button type="submit">Prenota Ora</button>
    </form>
</section>

<!-- Footer con registrazione -->
<footer>
    <h3>Registrati per ricevere le ultime novità</h3>

    <!-- Form di registrazione -->
    <form action="registrazione.php" method="POST">
        <input type="email" name="email" placeholder="Inserisci la tua email" required>
        <button type="submit">Registrati</button>
    </form>
</footer>

<!-- Script esterno -->
<script src="../funzioni.js"></script>

</body>
</html>
