@extends('layouts/skelet')


@section('content')
    <div class = "container">
        <h1>Lista Staff</h1>
        @if ($utenti->isEmpty())
            <p>Non sono presenti account registrati</p>
        @else
                @csrf
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
                            <th>Livello</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($utenti as $utente)
                            <tr>
                                <td><img src="{{ $utente->profile_picture() }}" alt="Profile Picture" class="profile-image">
                                </td>
                                <td>{{ $utente->username }}</td>
                                <td>{{ $utente->nome }}</td>
                                <td>{{ $utente->cognome }}</td>
                                <td>{{ $utente->dataNascita }}</td>
                                <td>{{ $utente->indirizzo }}</td>
                                <td>{{ $utente->telefono }}</td>
                                <td>{{ $utente->livello }}</td>
                                <td>
                                    <form action="{{ route('user.delete', $utente->username) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="username" value="{{ $utente->username }}">
                                        <button type="submit" class="button-style delete-button">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endif
    </div>
    
@endsection
