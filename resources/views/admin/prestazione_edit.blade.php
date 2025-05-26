@extends('areaPrestazioni.prestazione')

@section("form")

    {{ html()->modelForm($prestazione, "POST")->route('prestazione.edit', $id)->class('form-style')->open() }}

    <h3 class="form-description">Modifica Prestazione</h3>

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

    {{ html()->submit('Modifica Prestazione')->class('submit-button button-style') }}

    {{ html()->closeModelForm() }}

@endsection
