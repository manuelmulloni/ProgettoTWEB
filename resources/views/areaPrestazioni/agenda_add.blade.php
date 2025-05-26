@extends('area3.agenda')

@section('form')
    <h3>Aggiungi prestazione in agenda</h3>
    <div class="content">
        {{ html()->form('POST')->route('agenda.create')->class('form-style')->open() }}

        <h3 class="form-description">Aggiunta Prestazione in Agenda</h3>

        <div class="form-group">
            {{ html()->label('Prestazione')->for('idPrestazione') }}
            {{ html()->select('idPrestazione')->class('select-style')->required()->options($prestazioni->pluck('nome', 'id')) }}
        </div>

        <div class="form-group">
            {{ html()->label('Giorno')->for('giorno_settimana') }}
            {{ html()->select('giorno_settimana')->class('select-style')->required()->options(['Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato', 'Domenica']) }}
        </div>

        <div class="form-group">
            {{ html()->label('Ora Inizio')->for('orario_inizio') }}
            {{ html()->time('orario_inizio')->class('')->attribute("step", "60")->required() }}
        </div>

        <div class="form-group">
            {{ html()->label('Ora fine')->for('orario_fine') }}
            {{ html()->time('orario_fine')->class('')->attribute("step", "60")->required() }}
        </div>

        {{ html()->submit('Aggiungi Prestazione')->class('submit-button button-style') }}

        {{ html()->form()->close() }}
    </div>
@endsection
