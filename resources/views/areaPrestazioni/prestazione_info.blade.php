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
            {{-- Grid Item 1: Nome --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <small>Slot dello</small> <br>
                <strong>{{ $prestazione->nome }}</strong>
            </div>

            {{-- Grid Item 2: Descrizione --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <small>Descrizione</small> <br>
                <strong>{{ $prestazione->descrizione }}</strong>
            </div>

            {{-- Grid Item 3: Prescrizioni --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <small>Prescrizioni</small> <br>
                <strong>{{ $prestazione->prescrizioni }}</strong>
            </div>

            {{-- Grid Item 4: Medico --}}
            <div
                style="text-align: center; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                    <small>Medico</small> <br>
                    <strong>{{ $prestazione->medico }}</strong>
            </div>
        </div>


    {{ html()->form('POST', route('prenotazione.create'))->class('form-style')->open() }}

        {{ html()->hidden('idPrestazione', $prestazione->id) }}

    <div class="form-group">
        {{ html()->label('Data Esclusa')->for('dataEsclusa') }}
        {{ html()->date('dataEsclusa')->class('form-control')->required() }}
    </div>

    <div class="form-group">
        {{ html()->hidden('usernamePaziente', Auth::user()->username) }}
    </div>


    {{ html()->submit('Prenota')->class('submit-button button-style') }}

    {{ html()->form()->close() }}

    </div>
@endsection
