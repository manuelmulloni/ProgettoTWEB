@extends('dipartimenti')

@section('form')

    {{ html()->form('POST', route('dipartimento.create'))->class('form-style')->open() }}

    <h3 class="form-description">Nuovo Dipartimento</h3>

    <div class="form-group">
        {{ html()->label('Nome')->for('nome') }}
        {{ html()->text('nome')->class('form-control')->required() }}
    </div>

    <div class="form-group">
        {{ html()->label('Descrizione')->for('descrizione') }}
        {{ html()->textarea('descrizione')->class('text-area-style')->required() }}
    </div>

    {{ html()->submit('Aggiungi Dipartimento')->class('submit-button button-style') }}

    {{ html()->form()->close() }}
@endsection
