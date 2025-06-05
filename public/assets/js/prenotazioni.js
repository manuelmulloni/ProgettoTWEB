document.addEventListener('DOMContentLoaded', function () {
    $('#search').on('keyup', function () {
        const query = $(this).val();
        if (query.length > 1) {
            $.ajax({
                url: "/public/cliente/prenotazione/prestazione-autocomplete",
                type: "GET",
                data: { query: query },
                success: function (data) {
                    let resultList = $('#result-list');
                    resultList.empty();
                    if (data.length > 0) {
                        data.forEach(item => {
                            resultList.append(`
                                    <li
                                        data-id="${item.id}"
                                        data-medico="${item.medico || ''}"
                                        data-descrizione="${item.descrizione || ''}"
                                        data-prescrizione="${item.prescrizione || ''}"
                                        style="padding:5px; cursor:pointer;">
                                        ${item.nome}
                                    </li>
                                `);
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
            $('#result-list').hide();
        }
    });

    $(document).on('click', '#result-list li', function () {
        const selectedName = $(this).text();
        const selectedId = $(this).data('id');
        const medico = $(this).data('medico');
        const descrizione = $(this).data('descrizione');
        const prescrizione = $(this).data('prescrizione');

        $('#search').val(selectedName);
        $('#result-list').hide();

        $('#service-name').text(selectedName);
        $('#service-medico').text(medico);
        $('#service-descrizione').text(descrizione);
        $('#service-prescrizione').text(prescrizione);

        $('#selected-service').show();
        $('#book-button').data('id', selectedId);
    });

    $('#book-button').on('click', function () {
        const prestazioneId = $(this).data('id');
        $('#prestazione-id').val(prestazioneId);
        $('#booking-form').submit();
    });

    // Nasconde la lista risultati se clicchi fuori
    $(document).click(function (event) {
        if (!$(event.target).closest('#search, #result-list').length) {
            $('#result-list').hide();
        }
    });
});