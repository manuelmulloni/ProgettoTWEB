<?php



@extends layouts.skelet

@section('content')
    <div class="container">
        <h2>Dipendenti del dipartimento: {{ $dipartimento->nome }}</h2>

        @if ($dipendenti->isEmpty())
            <p>Nessun dipendente con livello 3 trovato.</p>
        @else
            <ul>
                @foreach ($dipendenti as $dipendente)
                    <li>
                        {{ $dipendente->utenti->nome }} {{ $dipendente->utenti->cognome }}
                        {{ $dipendente->utenti->email }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
