{{ html()->form('POST', route('prenotazione.create'))->class('form-style')->open() }}

<h3 class="form-description">Nuova Prenotazione</h3>
{{ html()->select('idDipartimento')->class('select_style')->id('idDipartimento')->required()->options($dipartimenti->pluck('nome', 'id')) }}

{{ html()->select('idPrestazione')->class('select_style')->id('idPrestazione')->required()->options([]) }}

<div class="form-group">
    {{ html()->label('Data Esclusa')->for('dataEsclusa') }}
    {{ html()->date('dataEsclusa')->class('form-control')->required() }}
</div>

<div class="form-group">
    {{ html()->hidden('usernamePaziente', Auth::user()->username) }}
</div>

{{ html()->submit('Aggiungi Prenotazione')->class('submit-button button-style') }}

{{ html()->form()->close() }}

<script src="{{ asset('assets/js/prenotazioniCreate.js') }}"></script>
