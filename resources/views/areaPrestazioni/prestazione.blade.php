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
                                    <form action="{{ route('prestazione.edit', $prestazione->id) }}" method="GET">
                                        <button type="submit" class="edit-button button-style">Modifica</button>
                                    </form>
                                    <form action="{{ route('prestazione.delete', $prestazione->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button button-style">Elimina</button>
                                    </form>
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
