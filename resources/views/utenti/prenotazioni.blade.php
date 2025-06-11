@extends('layouts/skelet')

@section('content')


        
{{-- AUTOCOMPLETE + PRENOTA --}}
    <div class="container" style="margin-top: 30px; position: relative;">
        @if (auth()->user() && auth()->user()->livello === 2)
            @include('utenti.prenotazioni_create')
        @endif
        
        <p>Cerca una determinata prestazione</p>
        <input type="text" id="search" placeholder="Cerca per nome prestazione o dipartimento" autocomplete="off">

        <div id="selected-services"
            style="margin-top: 20px; display: none; border: 1px solid #ddd; padding: 15px; max-width: 600px;">
        </div>
    </div>

    <h1>Le tue prenotazioni</h1>
    <div class="content">
        @if ($prenotazioni->isEmpty())
            <p>Non ci sono prenotazioni disponibili.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Data Esclusa</th>
                        <th>Nome Prestazione</th>
                        <th>Data Assegnata</th>
                        <th>Orario Assegnato</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prenotazioni as $prenotazione)
                        <tr>
                            <td>{{ isset($prenotazione->dataEsclusa) ? $prenotazione->dataEsclusa : 'Nessuna data esclusa' }}
                            </td>
                            <td>{{ $prenotazione->prestazione->nome }}</td>
                            @if (isset($prenotazione->data))
                                <td>{{ $prenotazione->data }}</td>
                                <td>{{ $prenotazione->orario_inizio }}</td>
                            @else
                                <td colspan="2">Non ancora assegnata</td>
                            @endif
                            <td>
                                <form action="{{ route('prenotazione.delete', $prenotazione->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button-style delete-button"
                                        {{ isset($prenotazione->isUsed) && $prenotazione->isUsed ? 'disabled' : '' }}>Annulla</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $prenotazioni->links('paginator') }}
        @endif
    </div>

    <script src="{{ asset('assets/js/prenotazioni.js') }}"></script>
@endsection
