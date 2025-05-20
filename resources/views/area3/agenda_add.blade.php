@extends('layouts/skelet')

@section('content')
    <!-- Temporary Style. TODO: MOVE TO CSS -->
    <style>
        .content {
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        .button-style {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-items: center;
            vertical-align: middle
                /* font-size: 16px; */
        }

        .edit-button {
            background-color: #4ba3f7;
            /* box-shadow: inset 2px 2px #4b4df7, inset -2px -2px #4b4df7; */
        }

        .delete-button {
            background-color: #f03131;
        }

        .submit-button {
            background-color: #26da27;
            font-size: 130%;
        }

        .form-style {
            border: #4ba3f7 solid 1px;
            margin-top: 20px;
            width: 30%;
        }

        .text-area-style {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .select-style {
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
            
        }

        .form-description {
            width: 100%;
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .agenda-day {
            margin-bottom: 20px;
        }
    </style>


    <h1>Prestazioni</h1>
    <div class="content">
        {{ html()->form('POST')->route('agenda.create')->class('form-style')->open() }}

        <h3 class="form-description">Aggiunta Prestazione in Agenda</h3>

        <div class="form-group">
            {{ html()->label('Prestazione')->for('idPrestazione') }}
            {{ html()->select('Prestazione')->class('select-style')->required()->options($prestazioni->pluck('nome', 'id')) }}
        </div>

        <div class="form-group">
            {{ html()->label('Giorno')->for('giorno_settimana') }}
            {{ html()->select('giorno_settimana')->class('select-style')->required()->options(['Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato', 'Domenica']) }}
        </div>

        <div class="form-group">
            {{ html()->label('Ora Inizio')->for('orario_inizio') }}
            {{ html()->time('orario_inizio', "09:00", "24")->class('')->required() }}
        </div>

        <div class="form-group">
            {{ html()->label('Ora fine')->for('orario_fine') }}
            {{ html()->time('orario_fine', "18:00", "18:01")->class('')->required() }}
        </div>

        {{ html()->submit('Aggiungi Prestazione')->class('submit-button button-style') }}

        {{ html()->form()->close() }}
    </div>
@endsection
