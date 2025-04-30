<?php
session_start();
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dipartimenti Salus</title>

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

        /* Stile per le sezioni */
        .dip_section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px; /* spazio tra gli elementi */
            padding: 40px;
        }
        /* Stile per elementi della sezione */
        .dip_section  a,
        .dip_section  a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            background-color: #2E8B57;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

    </style>
</head>

<body>
<header>
    <div class="logo">Dipartimenti Salus</div>
</header>
<section>
    <h1 class="dip_section">
        <a href="cardiologia.php">Cardiologia</a>
    </h1>

    <h2 class="dip_section">
        <a href="oculistica.php">Oculistica</a>
    </h2>


</section>

</body>
