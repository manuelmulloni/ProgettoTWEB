
@extends('layouts/skelet')
@section('content')


<div id="content">
    <h1>Statistiche</h1>
    <p>Seleziona il tipo di statistica da visualizzare:</p>
    <ul>
        <li><a href="{{ route('stat.Dipartimento') }}">Per Dipartimento</a></li>
        <li><a href="{{ route('stat.Cliente') }}">Per Cliente</a></li>
        <li><a href="{{ route('stat.Prestazione') }}">Per Prestazione</a></li>
    </ul>
@endsection
