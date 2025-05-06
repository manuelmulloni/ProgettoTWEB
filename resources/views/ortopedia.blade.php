<?php
// Simulazione dell'ottenimento dei dati dal database
$specialisti = [['nome' => 'Dott. Luca', 'cognome' => 'Rossi'], ['nome' => 'Dott. Marco', 'cognome' => 'Verdi'], ['nome' => 'Dott. Elena', 'cognome' => 'Bianco']];

$prestazioni = [['nome' => 'Visita ortopedica', 'descrizione' => 'Visita per la diagnosi di patologie ortopediche'], ['nome' => 'Esame diagnostico', 'descrizione' => 'Misurazione di sintomi ortopedici'], ['nome' => 'Trattamento di fratture', 'descrizione' => 'Trattamento per fratture ossee'], ['nome' => 'Controllo della spina dorsale', 'descrizione' => 'Controllo dello stato della spina dorsale']];

?>
@extends('layouts/skelet')


@section('content')
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

@endsection