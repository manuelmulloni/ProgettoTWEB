@extends('layouts.skelet')

@section('content') {{-- da cambiare per rendere dinaico --}}
        <div class="container">
            <h1>Dipartimenti</h1>
            <p>Il nostro poliambulatorio offre una vasta gamma di dipartimenti per soddisfare le tue esigenze sanitarie.</p>
            @if($List->isEmpty())
                <p>Nessun dipartimento disponibile.</p>
            @else
                <ul>
                    @foreach ($List as $dipartimento)
                        <li>
                            <a href="{{ route('dipSpec', $dipartimento->id) }}">
                                {{ $dipartimento->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
@endsection

