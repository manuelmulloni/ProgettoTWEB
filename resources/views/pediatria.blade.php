<?php
// Simulazione dell'ottenimento dei dati dal database
$specialisti = [['nome' => 'Dott.ssa Maria', 'cognome' => 'Bianchi'], ['nome' => 'Dott. Andrea', 'cognome' => 'Romano'], ['nome' => 'Dott.ssa Laura', 'cognome' => 'Ferrari']];

$prestazioni = [['nome' => 'Visita pediatrica', 'descrizione' => 'Controllo generale della salute del bambino'], ['nome' => 'Controllo crescita', 'descrizione' => 'Monitoraggio dello sviluppo fisico'], ['nome' => 'Vaccinazioni', 'descrizione' => 'Somministrazione vaccini secondo calendario'], ['nome' => 'Visita neonatale', 'descrizione' => 'Prima visita per neonati'], ['nome' => 'Consulenza alimentare', 'descrizione' => 'Consigli su alimentazione e sviluppo']];

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
