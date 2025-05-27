@extends('utenti.prenotazioni')

@section('form')

    {{ html()->form('POST', route('prenotazioni.create'))->class('form-style')->open() }}

    <h3 class="form-description">Nuova Prenotazione</h3>

    <div class="form-group">
        {{ html()->label('Prestazione')->for('idPrestazione') }}
        {{ html()->select('idPrestazione')->class('select_style')->required()->options($prestazioni->pluck('nome', 'id')) }}
    </div>

    <div class="form-group">
        {{ html()->label('Data Esclusa')->for('dataEsclusa') }}
        {{ html()->date('dataEsclusa')->class('form-control')->required() }}
    </div>

    <div class="form-group">
        {{ html()->hidden('usernamePaziente', Auth::user()->username) }}
    </div>

    {{ html()->submit('Aggiungi Prenotazione')->class('submit-button button-style') }}

    {{ html()->form()->close() }}

@endsection
