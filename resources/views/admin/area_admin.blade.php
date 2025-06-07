@extends('layouts/skelet')


@section('content')


    <div class="container">
        Bentornato nella tua area personale, {{ Auth::user()->nome }}!
        <br>
        Operazioni disponibili:
        <br>
        <div class="flex-center">
            <a href = "{{route('prestazioni')}}"> Prestazioni</a>
            <a href = "{{route('dipartimentiAdmin')}}" > Dipartimenti</a>
            <a href = "{{route('getStaff')}}" > Gestione ripartizione prestazioni</a>
            <a href = "{{route('getUsers')}}" > Gestione utenti</a>
            <a href = "{{route('statistiche')}}" >Statistiche</a>
        </div>
    </div>
@endsection

