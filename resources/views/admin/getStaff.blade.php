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
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($utenti as $utente)
                    <tr>
                        <td>{{ $utente->username }}</td>
                        <td>{{ $utente->nome }}</td>
                        <td>{{ $utente->cognome }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection


