    <h3 >Nuova Prenotazione</h3>
    <select name="idDipartimento" id="idDipartimento" class="select_style" required>
        @foreach ($dipartimenti as $dipartimento)
            <option value="{{ $dipartimento->id }}">{{ $dipartimento->nome }}</option>
        @endforeach
    </select>

    <select name="idPrestazione" id="idPrestazione" class="select_style" required>
    </select>

    <button id="button" class="edit-button button-style">Vai alla prenotazione</button>

<script src="{{ asset('assets/js/prenotazioniCreate.js') }}"></script>

{!! JsValidator::formRequest('App\Http\Requests\NewPrenotazioneRequest') !!}