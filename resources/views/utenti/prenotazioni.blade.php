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

    <div class="container">
        <p>Cerca una determinata prestazione</p>
        <input type="text" id="search" placeholder="Cerca per nome prestazione o dipartimento">
        <ul id="result-list" style="border: 1px solid #ccc; display:none; position:absolute; background:white; width:300px;"></ul>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            console.log("Digitato:", $(this).val());
            const query = $(this).val();
            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('prestazione.autocomplete') }}",
                    type: "GET",
                    data: { query: query },
                    success: function (data) {
                        console.log("Risposta dal server:", data);
                        let resultList = $('#result-list');
                        resultList.empty();
                        if (data.length > 0) {
                            data.forEach(item => {
                                resultList.append(`<li style="padding:5px;">${item.nome}</li>`);
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
            $('#search').val($(this).text());
            $('#result-list').hide();
        });
    });
</script>

