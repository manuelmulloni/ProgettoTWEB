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
                        <td class="flex-center">
                            <form action="{{ route('agenda.show', $element->id) }}" method="GET">
                                <button type="submit" class="button-style edit-button">Modifica</button>
                            </form>
                            <form action="{{ route('agenda.delete', $element->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo elemento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button-style delete-button">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $agendaElements->links("paginator") }}
        <div class="flex-space-between" style="margin-top: 20px;">
            @yield('form')
            <div class="">
                <label for="datePicker" class="form-label">Seleziona Data:</label>
                <input type="date" id="datePicker" class="form-control" value="{{ $showDate }}"
                    onchange="document.location.href='{{ route('agenda') }}?date=' + this.value">
            </div>
        </div>
    </div>

@endsection
