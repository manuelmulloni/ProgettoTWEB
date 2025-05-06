<?php
// Simulazione dell'ottenimento dei dati dal database
$specialisti = [['nome' => 'Dott. Giovanni', 'cognome' => 'Bianchi'], ['nome' => 'Dott.ssa Elena', 'cognome' => 'Rossi'], ['nome' => 'Dott. Matteo', 'cognome' => 'Verdi']];

$prestazioni = [['nome' => 'Radiografia', 'descrizione' => 'Esame radiografico per la diagnosi di fratture e altre patologie'], ['nome' => 'Risonanza Magnetica', 'descrizione' => 'Esame di imaging avanzato per organi e tessuti'], ['nome' => 'Ecografia', 'descrizione' => 'Esame ecografico per la valutazione di organi interni'], ['nome' => 'TAC', 'descrizione' => 'Tomografia computerizzata per immagini dettagliate']];
?>
@extends('layouts.skelet')

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