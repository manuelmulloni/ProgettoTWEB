@extends('layouts.skelet')

@section('content')
    </style>
    <div class="container">

        {{-- Main grid container --}}
        <div
            style="
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Creates two columns, each taking equal width */
            grid-template-rows: auto auto; /* Creates two rows, height adjusts to content */
            gap: 20px; /* Space between grid items */
            margin-bottom: 20px; /* Margin below the entire grid */
            /* Optional: Add a max-width to the grid if it should not span the full container width */
            /* max-width: 800px; */
            /* margin-left: auto; */
            /* margin-right: auto; */
        ">
            {{-- Grid Item 1: Slot Data --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <small>Slot dello</small> <br>
                <strong>{{ $agendaElement->data }}</strong>
            </div>

            {{-- Grid Item 2: Prestazione --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <small>Prestazione corrispondente</small> <br>
                <strong>{{ $agendaElement->prestazione->nome }}</strong>
            </div>

            {{-- Grid Item 3: Orario --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <small>Orario</small> <br>
                <strong>{{ $agendaElement->orario_inizio }}</strong>
            </div>

            {{-- Grid Item 4: Prenotato da --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
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
                    <button type="submit" class="button-style delete-button button-text">Annulla Prenotazione</button>
                </form>
            </div>
        @else
            <div class="">
                <form action="{{ route('agenda.appointment.new', $agendaElement->id) }}" method="GET">
                    <button type="submit" class="submit-button button-style button-text">Aggiungi Prenotazione</button>
                </form>
            </div>
        @endif
    </div>
@endsection
