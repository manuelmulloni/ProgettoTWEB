@extends('layouts/skelet')

@section('content')
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
                                <a href="{{ route('agenda.show', $element->id) }}">Modifica</a>
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
