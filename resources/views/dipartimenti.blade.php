@extends('layouts.skelet')

@section('content')
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
                        @if(auth()->user() && auth()->user()->livello === 4)
                        {{-- Pulsante Modifica --}}
                        <form action="{{ route('dipartimento.modifica', $dipartimento->id) }}" method="GET">
                            <button type="submit" class="edit-button button-style">Modifica</button>
                        </form>

                        {{-- Pulsante Cancella --}}
                        <form action="{{ route('dipartimento.cancella', $dipartimento->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler cancellare questo dipartimento?')">
                                Cancella
                            </button>
                        </form>
                    </li>
                    @endif
                @endforeach
            </ul>
        @endif

        @if(auth()->user() && auth()->user()->livello === 4)
            @yield('form')
        @endif
    </div>
@endsection
