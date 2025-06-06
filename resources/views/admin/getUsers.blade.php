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
                            <td>
                                <form action="{{ route('user.permission.edit') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="username" value="{{ $utente->username }}">
                                    <select name="livello" class="select-style"
                                        onchange="if (confirm('Sei sicuro di voler modificare il livello di questo utente?')) { this.form.submit(); }">
                                        @foreach ([2, 3, 4] as $livello)
                                            <option value="{{ $livello }}"
                                                {{ $utente->livello == $livello ? 'selected' : '' }}>
                                                @switch($livello)
                                                    @case(2)
                                                        Utente
                                                    @break

                                                    @case(3)
                                                        Staff
                                                    @break

                                                    @case(4)
                                                        Amministratore
                                                    @break
                                                @endswitch
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                            <div class="flex-center">
                                <button type="button" class="button-style edit-button" onclick="document.location = '{{ route('user.edit', ['username' => $utente->username]) }}'">Modifica</button>
                            <form action="{{ route('user.delete') }}" method="POST"
                                style="display:inline;">
                                @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="username" value="{{ $utente->username }}">
                                    <button type="submit" class="button-style delete-button">Elimina</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $utenti->links('paginator') }}
        @endif
    </div>

@endsection
