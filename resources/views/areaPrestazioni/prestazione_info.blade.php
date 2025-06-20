@extends('layouts.skelet')

@section('content')
    </style>
    <div class="container">

        {{-- Main grid container --}}
        <div class="two-by-two-grid">
            {{-- Grid Item 1: Nome --}}
            <div class="grid-item">
                <small>Nome</small> <br>
                <strong>{{ $prestazione->nome }}</strong>
            </div>

            {{-- Grid Item 2: Descrizione --}}
            <div class="grid-item">
                <small>Descrizione</small> <br>
                <strong>{{ $prestazione->descrizione }}</strong>
            </div>

            {{-- Grid Item 3: Prescrizioni --}}
            <div class="grid-item">
                <small>Prescrizioni</small> <br>
                <strong>{{ $prestazione->prescrizioni }}</strong>
            </div>

            {{-- Grid Item 4: Medico --}}
            <div class="grid-item">
                <small>Medico</small> <br>
                <strong>{{ $prestazione->medico }}</strong>
            </div>
            {{-- Grid Item 5: Medico --}}
            <div class="grid-item">
                <small>Giorni della settimana</small> <br>
                @foreach ($giorni as $giorno)
                <strong>{{ $giorno}}</strong><br>
                @endforeach
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
