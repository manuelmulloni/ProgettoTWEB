
    {{ html()->form('POST', route('prenotazione.create'))->class('form-style')->open() }}

    <h3 class="form-description">Nuova Prenotazione</h3>
    {{ html()->select('idDipartimento')
    ->class('select_style')
    ->id('idDipartimento')
    ->required()
    ->options($dipartimenti->pluck('nome', 'id')) }}

    {{ html()->select('idPrestazione')
        ->class('select_style')
        ->id('idPrestazione')
        ->required()
        ->options([]) }}

    <div class="form-group">
        {{ html()->label('Data Esclusa')->for('dataEsclusa') }}
        {{ html()->date('dataEsclusa')->class('form-control')->required() }}
    </div>

    <div class="form-group">
        {{ html()->hidden('usernamePaziente', Auth::user()->username) }}
    </div>

    {{ html()->submit('Aggiungi Prenotazione')->class('submit-button button-style') }}

    {{ html()->form()->close() }}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dipartimentoSelect = document.getElementById('idDipartimento');
            const prestazioneSelect = document.getElementById('idPrestazione');

            function caricaPrestazioni(dipId) {
                if (!dipId) return;

                prestazioneSelect.innerHTML = '<option disabled selected>Caricamento...</option>';

                fetch(`{{ url('/cliente/prestazioni') }}/${dipId}`)
                    .then(response => {
                        if (!response.ok) throw new Error(`Errore HTTP: ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        prestazioneSelect.innerHTML = '';

                        if (Object.keys(data).length === 0) {
                            const option = document.createElement('option');
                            option.textContent = 'Nessuna prestazione disponibile';
                            option.disabled = true;
                            prestazioneSelect.appendChild(option);
                            return;
                        }

                        for (const id in data) {
                            const option = document.createElement('option');
                            option.value = id;
                            option.textContent = data[id];
                            prestazioneSelect.appendChild(option);
                        }
                    })
                    .catch(error => {
                        console.error('Errore durante il fetch:', error);
                        prestazioneSelect.innerHTML = '<option disabled>Errore nel caricamento</option>';
                    });
            }

            // Listener per cambiamento dipartimento
            dipartimentoSelect.addEventListener('change', function () {
                caricaPrestazioni(this.value);
            });

            // Al caricamento, se c'è un valore selezionato, carica subito le prestazioni
            if (dipartimentoSelect.value) {
                caricaPrestazioni(dipartimentoSelect.value);
            }
        });
    </script>
