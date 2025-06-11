document.addEventListener('DOMContentLoaded', function () {
    $('#search').on('keyup', function () {
        const query = $(this).val();
        if (query.length > 1) {
            $.ajax({
                url: route('prestazione.autocomplete'),
                type: "GET",
                data: { query: query },
                success: function (data) {
                    let resultList = $('#selected-services');
                    resultList.empty();
                    if (data.length > 0) {
                        data.forEach(item => {
                            resultList.append( `
            <p><strong>Nome:</strong> ${item.nome}</p>
            <p><strong>Medico:</strong> ${item.medico}</p>
            <p><strong>Descrizione:</strong> ${item.descrizione}</p>
            <p><strong>Prescrizione:</strong> ${item.prescrizioni}</p>
            <button type="submit" class="button-style edit-button" style="margin-top: 10px;" onclick="window.location.href='${route('prestazione.info', item.id)}'">Vai alla prenotazione</button>
                            <br><br>
    `
                                    );
                        });
                        resultList.show();
                    } else {
                        resultList.hide();
                    }
                },
                error: function (xhr) {
                    console.error('Errore AJAX:', xhr.responseText);
                }
            });
        } else {
            $('#selected-services').hide();
        }
    });
});