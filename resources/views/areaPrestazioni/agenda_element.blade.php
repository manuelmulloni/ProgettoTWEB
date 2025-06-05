@extends('layouts.skelet')

@section('content')
    </style>
    <div class="container">

        {{-- Main grid container --}}
        <div class="two-by-two-grid">
            {{-- Grid Item 1: Slot Data --}}
            <div class="grid-item">
                <small>Slot dello</small> <br>
                <strong>{{ $agendaElement->data }}</strong>
            </div>

            {{-- Grid Item 2: Prestazione --}}
            <div class="grid-item">
                <small>Prestazione corrispondente</small> <br>
                <strong>{{ $agendaElement->prestazione->nome }}</strong>
            </div>

            {{-- Grid Item 3: Orario --}}
            <div class="grid-item">
                <small>Orario</small> <br>
                <strong>{{ $agendaElement->orario_inizio }}</strong>
            </div>

            {{-- Grid Item 4: Prenotato da --}}
            <div class="grid-item">
                @if (isset($agendaElement->prenotazione->cliente))
                    <small>Prenotato da</small> <br>
                    <strong>{{ $agendaElement->prenotazione->cliente->nome }}
                        {{ $agendaElement->prenotazione->cliente->cognome }}</strong>
                @else
                    <p>Non prenotato</p>
                @endif

            </div>
        </div>

        @if (isset($agendaElement->prenotazione->cliente))
            <div class="">
                <form action="{{ route('agenda.appointment.cancel', $agendaElement->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button-style delete-button">Annulla Prenotazione</button>
                </form>
            </div>
        @else
            <div class="">
                <form action="{{ route('agenda.appointment.new', $agendaElement->id) }}" method="GET">
                    <button type="submit" class="submit-button button-style">Aggiungi Prenotazione</button>
                </form>
            </div>
        @endif
    </div>
@endsection
