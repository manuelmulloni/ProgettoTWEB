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


    <h1>Agenda</h1>
    <div class="content">
        <p id="agenda-date"> Agenda del giorno: {{ $showDate }}</p>
        <table>
            <thead>
                <tr>
                    <th>Prestazione</th>
                    <th>Giorno</th>
                    <th>Ora</th>
                    <th>Prenotato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody id="agendaTableBody">
                @foreach ($agendaElements as $element)
                    <tr class="agenda-day">
                        <td>{{ $element->prestazione->nome }}</td>
                        <td>{{ $element->data }}</td>
                        <td>{{ $element->orario_inizio }}</td>
                        <td>{{ $element->prenotazione ? 'Sì' : 'No' }}</td>
                        <td>
                            <button class="button-style edit-button">
                                <a href="{{ route('agenda.edit', $element->id) }}">Modifica</a>
                            </button>
                            <button class="button-style delete-button">
                                <a href="{{ route('agenda.delete', $element->id) }}">Elimina</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="operations" style="display: flex; justify-content: space-between; margin-top: 20px;">
            @yield('form')
            <div class="">
                <label for="datePicker" class="form-label">Seleziona Data:</label>
                <input type="date" id="datePicker" class="form-control" value="{{ $showDate }}"
                    onchange="document.location.href='{{ route('agenda') }}?date=' + this.value">
            </div>
        </div>
    </div>
@endsection
