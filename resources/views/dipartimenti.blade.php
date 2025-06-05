@extends('layouts.skelet')

@section('content')
    <div class="container">
        <h1>Dipartimenti</h1>
        <p>Il nostro poliambulatorio offre una vasta gamma di dipartimenti per soddisfare le tue esigenze sanitarie.</p>

        @if ($List->isEmpty())
            <p>Nessun dipartimento disponibile.</p>
        @else
            <ul>
                @foreach ($List as $dipartimento)
                    <div class="vertical-flex">
                        {{-- Link al Dipartimento --}}
                        <div>
                            <a href="{{ route('dipSpec', $dipartimento->id) }}">
                                {{ $dipartimento->nome }}

                            </a>
                        </div>
                        @if (auth()->user() && auth()->user()->livello === 4)
                            {{-- Pulsante Modifica --}}
                            <form action="{{ route('dipartimento.modifica', $dipartimento->id) }}" method="GET">
                                <button type="submit" class="button-style edit-button">Modifica</button>
                            </form>

                            {{-- Pulsante Cancella --}}
                            <form action="{{ route('dipartimento.cancella', $dipartimento->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button-style delete-button"
                                    onclick="return confirm('Sei sicuro di voler cancellare questo dipartimento?')">
                                    Cancella
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </ul>
        @endif

        @if (auth()->user() && auth()->user()->livello === 4)
            @yield('form')
        @endif
    </div>
@endsection
