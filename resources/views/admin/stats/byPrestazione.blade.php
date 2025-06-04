@extends('layouts/skelet')
@section('content')
    <div class="container">
        <h1>Statistiche per Prestazione</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Prestazione</th>
                <th>Numero di Prenotazioni.</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statistiche as $statistica)
                <tr>
                    <td>{{ $statistica->nome }}</td>
                    <td>{{ $statistica->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
