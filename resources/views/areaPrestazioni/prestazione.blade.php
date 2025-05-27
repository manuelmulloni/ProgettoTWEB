@extends('layouts/skelet')

@section('content')
    <h1>Prestazioni</h1>
    <div class="content">
        @if ($prestazioni->isEmpty())
            <p>Non ci sono prestazioni disponibili.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Dipartimento</th>
                        <th>Prescrizioni</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestazioni as $prestazione)
                        <tr>
                            <td>{{ $prestazione->nome }}</td>
                            <td>{{ $prestazione->descrizione }}</td>
                            <td>{{ $prestazione->dipartimento->nome }}</td>
                            <td>{{ $prestazione->prescrizioni }}</td>
                            <td>
                                @if(auth()->user() && auth()->user()->livello === 4)
                                    <button class="edit-button button-style">
                                        <a href="{{ route('prestazione.edit', $prestazione->id) }}">Modifica</a>
                                    </button>
                                    <button class="delete-button button-style">
                                        <a href="{{ route('prestazione.delete', $prestazione->id) }}">Elimina</a>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if(auth()->user() && auth()->user()->livello === 4)
            @yield('form')
        @endif
    </div>
@endsection
