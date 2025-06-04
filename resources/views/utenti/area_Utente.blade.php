@extends('layouts/skelet')

@section('content')

    <div class="container">
        <h2>Area Utente</h2>
        <p>Benvenuto, {{ Auth::user()->username }}!</p>

        <div class="content">
            <h3>Le tue informazioni personali</h3>
            <table>
                <tr>
                    <th>Nome</th>
                    <td>{{ Auth::user()->nome }}</td>
                </tr>
                <tr>
                    <th>Cognome</th>
                    <td>{{ Auth::user()->cognome }}</td>
                </tr>
            </table>
        </div>

        <div class="content">
            <h3>Modifica le tue informazioni</h3>
            <a href="{{ route('user.edit') }}">Modifica</a>
        </div>

        <div class="content">
            <h3>Le tue prenotazioni</h3>
          <a href="{{route('prenotazione.show')}}">Prenota</a>
        </div>


    </div>


    @include('layouts.timed_notif')
@endsection
