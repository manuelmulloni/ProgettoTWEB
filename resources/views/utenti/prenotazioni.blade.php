@extends('layouts/skelet')

@section('content')
    <h1>Prestazioni</h1>
    <label>Nome Dipartimento o nome Prestazione<input type='text' class='text'></inptut></label>
    <button>Cerca</button>
    <div class="content">
            <table>
                <thead>
                <tr>
                    <th>Data Esclusa</th>
                    <th>Nome Prestazione</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($prestazioni as $prestazione)
                    <tr>
                        <td>{{ $prestazione->nome }}</td>
                        <td>{{ $prestazione->medico }}</td>
                        <td><a href="{{route('prestazione.info',$prestazione->id)}}">Prenota</a></td>
                        <!-- metodi modifica o elimina prenotazione -->
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection

