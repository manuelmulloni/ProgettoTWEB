@extends('layouts.skelet')

@section('content')
    <style>
        .content {
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-text {
            color: white;
            text-decoration: none;
        }

        .button-style {
            padding: 5px 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            align-items: center;
            vertical-align: middle
                /* font-size: 16px; */
        }

        .edit-button {
            background-color: #4ba3f7;
            /* box-shadow: inset 2px 2px #4b4df7, inset -2px -2px #4b4df7; */
        }

        .delete-button {
            background-color: #f03131;
        }

        .submit-button {
            background-color: #26da27;
            font-size: 130%;
        }

        .form-style {
            border: #4ba3f7 solid 1px;
            margin-top: 20px;
            width: 30%;
        }

        .text-area-style {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .select-style {
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }

        .form-description {
            width: 100%;
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }
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
                <button class="button-style delete-button">
                    <a href="{{ route('agenda.show', $agendaElement->id) }}" class="button-text">Annulla Prenotazione</a>
                </button>
            </div>
        @else
            <div class="">
                <button class="button-style submit-button">
                    <a href="{{ route('agenda.show', $agendaElement->id) }}" class="button-text">Aggiungi Prenotazione</a>
                </button>
            </div>
        @endif
    </div>
@endsection
