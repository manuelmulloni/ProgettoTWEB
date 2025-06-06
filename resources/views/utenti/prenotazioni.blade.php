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
                            <td>{{ isset($prenotazione->dataEsclusa) ? $prenotazione->dataEsclusa : "Nessuna data esclusa"}}</td>
                            <td>{{ $prenotazione->prestazione->nome }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if (auth()->user() && auth()->user()->livello === 2)
            @include('utenti.prenotazioni_create')
        @endif
    </div>

    {{-- AUTOCOMPLETE + PRENOTA --}}
    <div class="container" style="margin-top: 30px; position: relative;">
        <p>Cerca una determinata prestazione</p>
        <input type="text" id="search" placeholder="Cerca per nome prestazione o dipartimento" autocomplete="off">
        <ul id="result-list"
            style="border: 1px solid #ccc; display:none; position:absolute; background:white; width:300px; max-height: 200px; overflow-y: auto; z-index:999;">
        </ul>

        <div id="selected-service"
            style="margin-top: 20px; display: none; border: 1px solid #ddd; padding: 15px; max-width: 600px;">
            <p><strong>Hai selezionato:</strong> <span id="service-name"></span></p>
            <p><strong>Medico:</strong> <span id="service-medico"></span></p>
            <p><strong>Descrizione:</strong> <span id="service-descrizione"></span></p>
            <p><strong>Prescrizione:</strong> <span id="service-prescrizione"></span></p>
            <button id="book-button" style="margin-top: 10px;">Prenota</button>
        </div>

        <form id="booking-form" method="POST" action="{{ route('prenotazioni.store') }}" style="display: none;">
            @csrf
            <input type="hidden" name="idPrestazione" id="prestazione-id">
        </form>
    </div>
@endsection

<script src="{{ asset('assets/js/prenotazioni.js') }}"></script>
