@extends('layouts.skelet')

@section('content') {{-- da cambiare per rendere dinaico --}}
        <div class="container">
            <h1>Dipartimenti</h1>
            <p>Il nostro poliambulatorio offre una vasta gamma di dipartimenti per soddisfare le tue esigenze sanitarie.</p>
            @if($dipartimenti->isEmpty())
                <p>Nessun dipartimento disponibile.</p>
            @else
                <ul>
                    @foreach ($dipartimenti as $dipartimento)
                        <li>
                            <a href="{{ route('dipSpec', $dipartimento->id) }}">
                                {{ $dipartimento->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>


        </div>
@endsection
{{--  <ul>
                <li><a href="{{ route('cardiologia') }}">Cardiologia</a></li>
                <li><a href="{{ route('dermatologia') }}">Dermatologia</a></li>
                <li><a href="{{ route('oculistica') }}">Oculistica</a></li>
                <li><a href="{{ route('ortopedia') }}">Ortopedia</a></li>
                <li><a href="{{ route('pediatria') }}">Pediatria</a></li>
                <li><a href="{{ route('radiologia') }}">Radiologia</a></li>
            </ul>--}}
