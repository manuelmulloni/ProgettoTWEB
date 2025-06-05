@extends('layouts/skelet')

@section('content')
    <div class="entry" id="{{ $dipartimento->id }}">
        <h1 class="DescDip">Dipartimento di {{ $dipartimento->nome }}</h1>
        <p class="lDescLable">Descrizione estesa (<span style="color:red;">mostra</span>)</p>
        <div class="lDesc" style="display:none;"></div> {{-- aggiunto per mostrare descrizione --}}
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
@endsection


<meta data-for-external-file="{{ json_encode(['id' => $dipartimento->id]) }}">
<script src="{{ asset('assets/js/datiDipartimento.js') }}"></script>
