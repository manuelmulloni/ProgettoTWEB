@extends('areaPrestazioni.prestazione')

@section('form')

    {{ html()->form('POST', route('prestazione.create'))->class('form-style')->open() }}

    <h3 class="form-description">Nuova Prestazione</h3>

    <div class="form-group">
        {{ html()->label('Nome')->for('nome') }}
        {{ html()->text('nome')->class('form-control')->required() }}
    </div>

    <div class="form-group">
        {{ html()->label('Descrizione')->for('descrizione') }}
        {{ html()->text('descrizione')->class('form-control')->required() }}
    </div>

    <div class="form-group">
        {{ html()->label('Prescrizioni')->for('prescrizioni') }}
        {{ html()->textarea('prescrizioni')->class('text-area-style')->required() }}
    </div>

    <div class="form-group">
        {{ html()->label('Dipartimento')->for('idDipartimento') }}
        {{ html()->select('idDipartimento')->class('select-style')->required()->options($dipartimenti->pluck('nome', 'id')) }}
    </div>
