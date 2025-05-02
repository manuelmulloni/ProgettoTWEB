<?php
// Simulazione dell'ottenimento dei dati dal database
$specialisti = [['nome' => 'Dott. Mario', 'cognome' => 'Neri'], ['nome' => 'Dott.ssa Giulia', 'cognome' => 'Gialli'], ['nome' => 'Dott. Paolo', 'cognome' => 'Blu']];

$prestazioni = [['nome' => 'Visita oculistica', 'descrizione' => 'Visita per la diagnosi di patologie dell\'occhio'], ['nome' => 'Esame della vista', 'descrizione' => 'Misurazione della vista'], ['nome' => 'Trattamento glaucoma', 'descrizione' => 'Trattamento per il glaucoma'], ['nome' => 'Controllo della retina', 'descrizione' => 'Controllo dello stato della retina']];

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

        <h1>Specialisti</h1>
        <ul>
            @foreach ($specialisti as $specialista)
                <li>{{ $specialista['nome'] . ' ' . $specialista['cognome'] }}</li>
            @endforeach
        </ul>


        <h1>Prestazioni</h1>
        <ul>
            @foreach ($prestazioni as $prestazione)
                <li>{{ $prestazione['nome'] . ': ' . $prestazione['descrizione'] }}</li>
            @endforeach
        </ul>

    </main>
</body>

</html>
