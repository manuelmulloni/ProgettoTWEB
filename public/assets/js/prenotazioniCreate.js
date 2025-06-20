document.addEventListener('DOMContentLoaded', function () {
    const dipartimentoSelect = document.getElementById('idDipartimento');
    const prestazioneSelect = document.getElementById('idPrestazione');

    function caricaPrestazioni(dipId) {
        if (!dipId) return;

        prestazioneSelect.innerHTML = '<option disabled selected>Caricamento...</option>';

        fetch(route('prestazioni.dipartimento', dipId))
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
    
    $('#button').on('click', function () {
    var selectedId = $('#idPrestazione').val();

    if (selectedId) {
        window.location.href = route('prestazione.info', selectedId);
    } else {
        alert('Seleziona un\'opzione dal menu a tendina');
    }
    });
});