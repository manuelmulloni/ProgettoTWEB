<?php
// Simulazione dell'ottenimento dei dati dal database
$specialisti = [['nome' => 'Dott. Mario', 'cognome' => 'Neri'], ['nome' => 'Dott.ssa Giulia', 'cognome' => 'Gialli'], ['nome' => 'Dott. Paolo', 'cognome' => 'Blu']];

$prestazioni = [['nome' => 'Visita dermatologica', 'descrizione' => 'Visita per la diagnosi di patologie cutanee'], ['nome' => 'Dermatologia pediatrica', 'descrizione' => 'Visita dermatologica per bambini'], ['nome' => 'Trattamento acne', 'descrizione' => 'Trattamento per l\'acne e le sue cicatrici'], ['nome' => 'Controllo nei', 'descrizione' => 'Controllo dei nei e della pelle']];

?>
@extends('layouts/skelet')

@section('content')

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
@endsection
