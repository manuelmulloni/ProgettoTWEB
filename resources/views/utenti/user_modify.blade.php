@extends('layouts.skelet')

@section('content')
    <div class="container">
        <h1>Modifica Utente</h1>

        {{ html()->modelForm($user, "POST")->route('user.update')->class('')->attribute('enctype', 'multipart/form-data')->open() }}

        <div class="form-group" hidden>
            {{ html()->label('Username')->for('username') }}
            {{ html()->text('username')->class('form-control')->attribute('readonly')->required() }}
        </div>

        <div class="form-group">
            {{ html()->label('Nome')->for('nome') }}
            {{ html()->text('nome')->class('form-control')->required() }}
        </div>

        <div class="form-group">
            {{ html()->label('Cognome')->for('cognome') }}
            {{ html()->text('cognome')->class('form-control')->required() }}
        </div>

        <div class="form-group">
            {{ html()->label('Indirizzo')->for('indirizzo') }}
            {{ html()->text('indirizzo')->class('form-control') }}
        </div>

        <div class="form-group">
            {{ html()->label('Telefono')->for('telefono') }}
            {{ html()->text('telefono')->class('form-control') }}
        </div>

        <div class="form-group">
            {{ html()->label('Immagine Profilo')->for('profile_picture') }}
            {{ html()->file('profile_picture')->class('form-control') }}
        </div>

        <div class="form-group">
            {{ html()->label('Password')->for('password') }}
            {{ html()->password('password')->class('form-control') }}
        </div>

        <div class="form-group">
            {{ html()->label('Ripeti Password')->for('password_confirmation') }}
            {{ html()->password('password_confirmation')->class('form-control') }}
        </div>

        {{ html()->submit('Aggiorna Utente')->class('submit-button button-style') }}

        {{ html()->closeModelForm() }}
    </div>


@endsection