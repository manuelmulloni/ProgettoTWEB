<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informazioni Salus</title>

    <style>
        /* Stile body */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Stile per header */
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

        section{
            padding: 20px;
            background-color: #f4f4f4;
        }

         section a{
            color: black;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            margin: 0 20px;
        }

        footer{
            background-color: #2E8B57;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>

<body>
    <header>
        <div class="logo">Informazioni Salus</div>
    </header>

    <section>
           <h1>Descrizione generale</h1>
           <p>Benvenuti nel Poliambulatorio Salus, dove la vostra salute è la nostra priorità.</p>
    </section>
    <section>
            <h1>Missione</h1>
            <p>La nostra missione è fornire servizi sanitari di alta qualità, accessibili e personalizzati per ogni paziente.</p>
    </section>

    <section>
            <h1>Contatti</h1>
            <a href="contatti.php">Contatti</a>
    </section>

    <section>
            <h1>Localizzazione</h1>
            <img src="" alt="Mappa posizione ambulatorio">
    </section>

    <section>
            <h1>Organizzazione interna servizi</h1>
            <a href="servizi.php">Servizi</a>
    </section>



    <footer>
        <p>&copy; 2023 Poliambulatorio Salus. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>

