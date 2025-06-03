@extends('layouts/skelet')

@section('content')
    <h1>Prenotazioni</h1>
    <div class="content">
        @if ($prenotazioni->isEmpty())
            <p>Non ci sono prenotazioni disponibili.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Data Esclusa</th>
                    <th>Nome Prestazione</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($prenotazioni as $prenotazione)
                    <tr>
                        <td>{{ $prenotazione->dataEsclusa }}</td>
                        <td>{{ $prenotazione->prestazione->nome }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if(auth()->user() && auth()->user()->livello === 2)
            @include('utenti.prenotazioni_create')
        @endif
    </div>

    {{-- AUTOCOMPLETE + PRENOTA --}}
    <div class="container" style="margin-top: 30px; position: relative;">
        <p>Cerca una determinata prestazione</p>
        <input type="text" id="search" placeholder="Cerca per nome prestazione o dipartimento" autocomplete="off">
        <ul id="result-list" style="border: 1px solid #ccc; display:none; position:absolute; background:white; width:300px; max-height: 200px; overflow-y: auto; z-index:999;"></ul>

        <div id="selected-service" style="margin-top: 20px; display: none; border: 1px solid #ddd; padding: 15px; max-width: 600px;">
            <p><strong>Hai selezionato:</strong> <span id="service-name"></span></p>
            <p><strong>Medico:</strong> <span id="service-medico"></span></p>
            <p><strong>Descrizione:</strong> <span id="service-descrizione"></span></p>
            <p><strong>Prescrizione:</strong> <span id="service-prescrizione"></span></p>
            <button id="book-button" style="margin-top: 10px;">Prenota</button>
        </div>

        <form id="booking-form" method="POST" action="{{ route('prenotazioni.store') }}" style="display: none;">
            @csrf
            <input type="hidden" name="idPrestazione" id="prestazione-id">
        </form>
    </div>
@endsection


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                const query = $(this).val();
                if (query.length > 1) {
                    $.ajax({
                        url: "{{ route('prestazione.autocomplete') }}",
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
            $(document).click(function(event) {
                if(!$(event.target).closest('#search, #result-list').length) {
                    $('#result-list').hide();
                }
            });
        });
    </script>

