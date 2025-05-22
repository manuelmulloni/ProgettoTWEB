@extends('layouts/skelet')


@section('content')
    <div class = "container">
        <h1>Lista Dipartimenti</h1>

        {{-- Bottone per mostrare il form di creazione --}}
        <form method="GET" action="">
            <button type="submit" name="show_create" value="1" class="button" style="background-color: green; color: white; margin-bottom: 1rem;">
                + Aggiungi Nuovo Dipartimento
            </button>
        </form>

        {{-- Form di creazione visibile solo se ?show_create=1 --}}
        @if(request('show_create'))
            <form action="{{ route('dipartimenti.create') }}" method="POST" style="margin-bottom: 2rem; border: 1px solid #ccc; padding: 1rem;">
                @csrf
                <h3>Nuovo Dipartimento</h3>

                <input type="text" name="name" placeholder="Nome" required>
                <input type="text" name="description" placeholder="Descrizione" required>

                <button type="submit" class="button">Crea</button>
                <a href="{{ route('getDipartimenti') }}" class="button" style="background-color: #ccc;">Annulla</a>
            </form>
        @endif

        {{-- Elenco dipartimenti con modifica + elimina --}}
        @foreach($dipartimenti as $dipartimento)
            <div style="margin-bottom: 1rem; border: 1px solid #ccc; padding: 10px;">
                <strong>{{ $dipartimento->nome }}</strong>

                {{-- Bottone modifica --}}
                <button type="button" onclick="toggleForm({{ $dipartimento->id }})" class="button" style="margin-left: 10px;">
                    Modifica
                </button>

                {{-- Form elimina --}}
                <form action="{{ route('dipartimenti.destroy', $dipartimento->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button" style="background-color: red; color: white;" onclick="return confirm('Sei sicuro di voler eliminare questo dipartimento?')">
                        Elimina
                    </button>
                </form>

                {{-- Form modifica --}}
                <form id="form-{{ $dipartimento->id }}" action="{{ route('dipartimenti.update', $dipartimento->id) }}" method="POST" style="display:none; margin-top: 10px;">
                    @csrf
                    @method('PUT')

                    <input type="text" name="name" value="{{ $dipartimento->nome }}" required>
                    <input type="text" name="description" value="{{ $dipartimento->descrizione }}" required>

                    <button type="submit" class="button">Salva</button>
                    <button type="button" onclick="toggleForm({{ $dipartimento->id }})" class="button" style="background-color: #ccc; color: black;">
                        Annulla
                    </button>
                </form>
            </div>
        @endforeach
@endsection
