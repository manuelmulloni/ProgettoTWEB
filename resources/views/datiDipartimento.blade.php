@extends('layouts/skelet')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@section('content')
    <div class="entry" id="{{ $dipartimento->id }}">
        <h1 class="DescDip">Dipartimento di {{ $dipartimento->nome }}</h1>
        <p class="lDescLable">Descrizione estesa (<span style="color:red;">mostra</span>)</p>
        <div class="lDesc" style="display:none;"></div> {{-- aggiunto per mostrare descrizione --}}
    </div>

    <h2>Prestazioni Offerte</h2>
    <div>
        @foreach ($prestazioni as $prestazione)
            <div class="container">
                <h3>{{ $prestazione->nome }}</h3>
                <p>{{ $prestazione->descrizione }}</p>
                <p>Prescrizioni: {{ $prestazione->prescrizioni }}</p>
                <p>Medico: {{ $prestazione->medico }}</p>
            </div>
        @endforeach
    </div>
@endsection

   <script>
        $(function () {
            $('.entry').on('click', function () {
                injectDescLong($(this), "{{ route('getDescDip', ['id' => 'idPlaceholder']) }}");
            });
        });

        function injectDescLong(dipartimento, route) {
            const id = dipartimento.attr('id');
            const lDesc = dipartimento.find('.lDesc');
            const lDescLable = dipartimento.find('.lDescLable');

            if (lDesc.is(':empty')) {
                $.ajax({
                    type: 'GET',
                    url: route.replace('idPlaceholder', id),
                    dataType: "json",
                    success: function (data) {
                        lDesc.html(data.descrizione).show();
                        lDescLable.html('Descrizione estesa (<span style="color:red;">nascondi</span>)');
                    }
                });
            } else if (lDesc.is(':hidden')) {
                lDesc.show();
                lDescLable.html('Descrizione estesa (<span style="color:red;">nascondi</span>)');
            } else {
                lDesc.hide();
                lDescLable.html('Descrizione estesa (<span style="color:red;">mostra</span>)');
            }
        }
    </script>
