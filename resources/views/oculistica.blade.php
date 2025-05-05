<?php
// Simulazione dell'ottenimento dei dati dal database
$specialisti = [['nome' => 'Dott. Mario', 'cognome' => 'Neri'], ['nome' => 'Dott.ssa Giulia', 'cognome' => 'Gialli'], ['nome' => 'Dott. Paolo', 'cognome' => 'Blu']];

$prestazioni = [['nome' => 'Visita oculistica', 'descrizione' => 'Visita per la diagnosi di patologie dell\'occhio'], ['nome' => 'Esame della vista', 'descrizione' => 'Misurazione della vista'], ['nome' => 'Trattamento glaucoma', 'descrizione' => 'Trattamento per il glaucoma'], ['nome' => 'Controllo della retina', 'descrizione' => 'Controllo dello stato della retina']];

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
