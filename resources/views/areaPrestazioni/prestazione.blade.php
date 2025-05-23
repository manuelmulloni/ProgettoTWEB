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

        th, td {
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
    </style>


    <h1>Prestazioni</h1>
    <div class="content">
        @if ($prestazioni->isEmpty())
            <p>Non ci sono prestazioni disponibili.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Dipartimento</th>
                        <th>Prescrizioni</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestazioni as $prestazione)
                        <tr>
                            <td>{{ $prestazione->nome }}</td>
                            <td>{{ $prestazione->descrizione }}</td>
                            <td>{{ $prestazione->dipartimento->nome }}</td>
                            <td>{{ $prestazione->prescrizioni }}</td>
                            <td>
                                @if(auth()->user() && auth()->user()->livello === 4)
                                    <button class="edit-button button-style">
                                        <a href="{{ route('prestazione.edit', $prestazione->id) }}">Modifica</a>
                                    </button>
                                    <button class="delete-button button-style">
                                        <a href="{{ route('prestazione.delete', $prestazione->id) }}">Elimina</a>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if(auth()->user() && auth()->user()->livello === 4)
            @yield('form')
        @endif
    </div>
@endsection
