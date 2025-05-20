<div class="agenda-day">

    <h2>Prestazioni del giorno {{ $day[0]->giorno_settimana }}</h2>

    <table>
        <thead>
            <tr>
                <th>Prestazione</th>
                <th>Ora Inizio</th>
                <th>Ora Fine</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($day as $prestazione)
                <tr>
                    <td>{{ $prestazione->prestazione->nome }}</td>
                    <td>{{ $prestazione->orario_inizio }}</td>
                    <td>{{ $prestazione->orario_fine }}</td>
                    <td>
                        <button class="edit-button button-style">
                            <a href="{{ route('agenda', $prestazione->id) }}">Modifica</a>
                        </button>
                        <button class="delete-button button-style">
                            <a href="{{ route('agenda.delete', $prestazione->id) }}">Elimina</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
