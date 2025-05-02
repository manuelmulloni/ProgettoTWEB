<?php
// Simulazione dell'ottenimento dei dati dal database
$specialisti = [['nome' => 'Dott. Mario', 'cognome' => 'Neri'], ['nome' => 'Dott.ssa Giulia', 'cognome' => 'Gialli'], ['nome' => 'Dott. Paolo', 'cognome' => 'Blu']];

$prestazioni = [['nome' => 'Visita dermatologica', 'descrizione' => 'Visita per la diagnosi di patologie cutanee'], ['nome' => 'Dermatologia pediatrica', 'descrizione' => 'Visita dermatologica per bambini'], ['nome' => 'Trattamento acne', 'descrizione' => 'Trattamento per l\'acne e le sue cicatrici'], ['nome' => 'Controllo nei', 'descrizione' => 'Controllo dei nei e della pelle']];

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliambulatorio Salus</title>
    <link rel="stylesheet" href="assets/css/body.css">
    <link rel="stylesheet" href="assets/css/containers.css">
    <link rel="stylesheet" href="assets/css/structure.css">
</head>

<body>
    @include("layouts/_header")

    <main class = "main">

        <h1>Dermatologia</h1>

        <h2>Specialisti</h2>
        <ul>
            @foreach ($specialisti as $specialista)
                <li>{{ $specialista['nome'] . ' ' . $specialista['cognome'] }}</li>
            @endforeach
        </ul>


        <h2>Prestazioni</h2>
        <ul>
            @foreach ($prestazioni as $prestazione)
                <li>{{ $prestazione['nome'] . ': ' . $prestazione['descrizione'] }}</li>
            @endforeach
        </ul>

    </main>

    @include("layouts/_footer")
</body>

</html>
