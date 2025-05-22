@extends('layouts.skelet')

@section('content')
    <div class="container">
        <h1>Lista Prestazioni</h1>

        {{-- Bottone per mostrare il form di creazione --}}
        <form method="GET" action="">
            <button type="submit" name="show_create" value="1" class="button" style="background-color: green; color: white; margin-bottom: 1rem;">
                + Aggiungi Nuova Prestazione
            </button>
        </form>

        {{-- Form di creazione visibile solo se ?show_create=1 --}}
        @if(request('show_create'))
            <form action="{{ route('prestazioni.create') }}" method="POST" style="margin-bottom: 2rem; border: 1px solid #ccc; padding: 1rem;">
                @csrf
                <h3>Nuova Prestazione</h3>

                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="descrizione" placeholder="Descrizione" required>
                <input type="text" name="prescrizioni" placeholder="Prescrizioni" required>
                <input type="number" name="dipartimento" placeholder="ID Dipartimento" required>

                <button type="submit" class="button">Crea</button>
                <a href="{{ route('getPrestazioni') }}" class="button" style="background-color: #ccc;">Annulla</a>
            </form>
        @endif

        {{-- Elenco prestazioni con modifica + elimina --}}
        @foreach($prestazioni as $prestazione)
            <div style="margin-bottom: 1rem; border: 1px solid #ccc; padding: 10px;">
                <strong>{{ $prestazione->nome }}</strong>

                {{-- Bottone modifica --}}
                <button type="button" onclick="toggleForm({{ $prestazione->id }})" class="button" style="margin-left: 10px;">
                    Modifica
                </button>

                {{-- Form elimina --}}
                <form action="{{ route('prestazioni.destroy', $prestazione->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button" style="background-color: red; color: white;" onclick="return confirm('Sei sicuro di voler eliminare questa prestazione?')">
                        Elimina
                    </button>
                </form>

                {{-- Form modifica --}}
                <form id="form-{{ $prestazione->id }}" action="{{ route('prestazioni.update', $prestazione->id) }}" method="POST" style="display:none; margin-top: 10px;">
                    @csrf
                    @method('PUT')

                    <input type="text" name="nome" value="{{ $prestazione->nome }}" required>
                    <input type="text" name="descrizione" value="{{ $prestazione->descrizione }}" required>
                    <input type="text" name="prescrizioni" value="{{ $prestazione->prescrizioni }}" required>
                    <input type="number" name="dipartimento" value="{{ $prestazione->idDipartimento }}" required>

                    <button type="submit" class="button">Salva</button>
                    <button type="button" onclick="toggleForm({{ $prestazione->id }})" class="button" style="background-color: #ccc; color: black;">
                        Annulla
                    </button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
