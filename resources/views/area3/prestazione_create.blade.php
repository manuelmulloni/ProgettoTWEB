@extends('area3.prestazione')

@section("form")

{{ html()->form("POST")->route('prestazione.create')->class('form-style')->open() }}

<div class="form-group">
    {{ html()->label('Nome')->for('nome') }}
    {{ html()->text('nome')->class('form-control')->required() }}
</div>
<div class="form-group">
    {{ html()->label('Descrizione')->for('descrizione') }}
    {{ html()->text('descrizione')->class('form-control')->required() }}
</div>

{{ html()->submit('Aggiungi Prestazione')->class('submit-button button-style') }}

{{ html()->form()->close() }}

@endsection