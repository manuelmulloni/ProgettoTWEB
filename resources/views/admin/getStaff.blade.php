@extends('layouts/skelet')


@section('content')
    <div class = "container">
        <h1>Lista Staff</h1>
        @if ($utenti->isEmpty())
            <p>Non è presente nessun mebro dello staff</p>
        @else
            <form method="POST" action="{{ route('admin.staff.updatePrestazioni') }}">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th>Selettore</th>
                            <th>Propic</th>
                            <th>Username</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Data di Nascita</th>
                            <th>Indirizzo</th>
                            <th>Telefono</th>
                            <th>Prestazioni Abilitate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($utenti as $utente)
                            <tr>
                                <td>
                                    <input type="checkbox" name="staff[]" value="{{ $utente->username }}">
                                </td>
                                <td><img src="{{ $utente->profile_picture() }}" alt="Profile Picture" class="profile-image">
                                </td>
                                <td>{{ $utente->username }}</td>
                                <td>{{ $utente->nome }}</td>
                                <td>{{ $utente->cognome }}</td>
                                <td>{{ $utente->dataNascita }}</td>
                                <td>{{ $utente->indirizzo }}</td>
                                <td>{{ $utente->telefono }}</td>
                                <td>
                                    <ul class="vertical-flex">
                                        @foreach ($utente->prestazioni as $prestazione)
                                            <li>
                                                {{ $prestazione->prestazione->nome }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="content vertical-flex">
                    <select name="prestazioni[]" multiple style="height: 150px; width: 300px;">
                        @foreach ($prestazioni as $prestazione)
                            <option value="{{ $prestazione->id }}">{{ $prestazione->nome }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="button-style edit-button">Aggiorna Prestazioni</button>
                </div>
            </form>
        @endif
    </div>
    {!! JsValidator::formRequest('App\Http\Requests\AddPrestazioniToUserRequest') !!}
@endsection
