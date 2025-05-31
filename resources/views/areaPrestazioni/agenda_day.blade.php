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
                        <form action="{{ route('agenda', $prestazione->id) }}" method="GET">
                            <button type="submit" class="edit-button button-style">Modifica</button>
                        </form>
                        <form action="{{ route('agenda.delete', $prestazione->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button button-style">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
