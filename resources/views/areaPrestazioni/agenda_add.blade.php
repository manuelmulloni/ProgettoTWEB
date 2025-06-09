@extends('areaPrestazioni.agenda')

@section('form')
    <div class="" style="width: 60%;">
        {{ html()->form('POST')->route('agenda.create')->class('form-style')->open() }}

        <h3 class="form-description">Aggiunta Prestazione in Agenda</h3>

        <div class="form-group">
            {{ html()->label('Prestazione')->for('idPrestazione') }}
            {{ html()->select('idPrestazione')->class('select-style')->required()->options($prestazioni->pluck('nome', 'id')) }}
        </div>

        <div class="form-group">
            {{ html()->label('Data')->for('data') }}
            {{ html()->date('data')->class('text-area-style')->required()->value($showDate) }}
        </div>

        <div class="form-group">
            {{ html()->label('Ora Inizio')->for('orario_inizio') }}
            {{ html()->time('orario_inizio')->class('')->attribute("step", "60")->required() }}
        </div>

        {{ html()->submit('Aggiungi Prestazione')->class('submit-button button-style') }}

        {{ html()->form()->close() }}
    </div>
@endsection
