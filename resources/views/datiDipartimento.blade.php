@extends('layouts/skelet')

@section('content')
    <div class="container">
        <div style="align-self: center; text-align: center;">
            <h1>Dipartimento di {{ $dipartimento->nome }}</h1>

        </div>
        <h2>Prestazioni Offerte</h2>
        <div>
            @foreach ($prestazioni as $prestazione)
                <div class="container">
                    <h3>{{ $prestazione->nome }}</h3>
                    <p>{{ $prestazione->descrizione }}</p>
                    <p>Prescrizioni: {{ $prestazione->prescrizioni }}</p>
                    <p>Medico: {{ $prestazione->medico }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
