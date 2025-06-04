@extends('layouts/skelet')
@section('content')
    <div class="container">
        <h1>Statistiche per Dipartimento</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Dipartimento</th>
                <th>Numero di Prenotazioni</th>
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
