@extends('layouts/skelet')


@section('content')
    <div class = "container">
        <h1>Lista Staff</h1>
        <div class="content">
        @if ($utenti->isEmpty())
            <p>Non è presente nessun mebro dello staff</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Propic</th>
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di Nascita</th>
                    <th>Indirizzo</th>
                    <th>Telefono</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($utenti as $utente)
                    <tr>
                        <td><img src="{{ $utente->profile_picture() }}" alt="Profile Picture" class="profile-image"></td>
                        <td>{{ $utente->username }}</td>
                        <td>{{ $utente->nome }}</td>
                        <td>{{ $utente->cognome }}</td>
                        <td>{{ $utente->dataNascita }}</td>
                        <td>{{ $utente->indirizzo }}</td>
                        <td>{{ $utente->telefono }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection


