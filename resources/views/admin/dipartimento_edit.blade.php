@extends('dipartimenti')

@section("form")

    {{ html()->modelForm($dipartimento, "POST")->route('dipartimento.modifica', $id)->class('form-style')->open() }}

    <h3 class="form-description">Modifica Dipartimento</h3>

    <div class="form-group">
        {{ html()->label('Nome')->for('nome') }}
        {{ html()->text('nome')->class('form-control')->required() }}
    </div>
    <div class="form-group">
        {{ html()->label('Descrizione')->for('descrizione') }}
        {{ html()->text('descrizione')->class('form-control')->required() }}
    </div>



    {{ html()->submit('Modifica Dipartimento')->class('submit-button button-style') }}

    {{ html()->closeModelForm() }}

@endsection
