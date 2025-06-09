@extends('layouts/skelet')
@section('content')
    <div class="container">
        <h1>Statistiche per Dipartimento</h1>
        <div>
            <p>Scegli data inizio</p>
            <input type="date" id="startDate" name="startDate" value="{{ $startDate }}" class="form-control">
        </div>
        <div>
            <p>Scegli data fine </p>
            <input type="date" id="endDate" name="endDate" value="{{ $endDate }}" class="form-control">
        </div>

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
