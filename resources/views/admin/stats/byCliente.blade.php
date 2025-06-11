@extends('layouts/skelet')
@section('content')
    <div class="container">
        <h1>Statistiche per Cliente</h1>
        <form method="GET" action="{{ route('stat.Cliente') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="startDate">Scegli data inizio</label>
                    <input type="date" id="startDate" name="startDate" value="{{ request('startDate') }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="endDate">Scegli data fine</label>
                    <input type="date" id="endDate" name="endDate" value="{{ request('endDate') }}" class="form-control">
                </div>
                <div class="col-md-4 align-self-end">
                    <button type="submit" class="btn btn-primary">Filtra</button>
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Numero di Prestazioni erogate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statistiche as $statistica)
                <tr>
                    <td>{{ $statistica->usernamePaziente }}</td>
                    <td>{{ $statistica->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
