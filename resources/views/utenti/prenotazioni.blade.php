@extends('layouts/skelet')

@section('content')
    <h1>Prenotazioni</h1>
    <div class="content">
        @if ($prenotazioni->isEmpty())
            <p>Non ci sono prenotazioni disponibili.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Data Esclusa</th>
                    <th>Nome Prestazione</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($prenotazioni as $prenotazione)
                    <tr>
                        <td>{{ $prenotazione->dataEsclusa }}</td>
                        <td>{{ $prenotazione->prestazione->nome }}</td>
                        <!-- metodi modifica o elimina prenotazione -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        @if(auth()->user() && auth()->user()->livello === 2)
            @yield('form')
        @endif
    </div>
@endsection

