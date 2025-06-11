@extends('layouts/skelet')

@section('content')
    <h1>Agenda</h1>
    <div class="content">
        <p id="agenda-date"> Aggiunta </p>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Richiesta il</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody id="agendaTableBody">
                @foreach ($prenotazioni as $prenotazione)
                    <tr class="agenda-day">
                        <td>{{ $prenotazione->cliente->nome }}</td>
                        <td>{{ $prenotazione->cliente->cognome }}</td>
                        <td>{{ $prenotazione->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form method="POST" action="{{ route('agenda.appointment.new', ['id' => $agendaElement->id]) }}">
                                @csrf
                                <button type="submit" class="button-style submit-button">
                                    Aggiungi Prenotazione
                                </button>
                                <input type="hidden" name="idPrenotazione" value="{{ $prenotazione->id }}">
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
