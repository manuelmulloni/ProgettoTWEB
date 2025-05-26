@extends('layouts.skelet')

@section('content')
    <div class="container">

        <div style="display: flex; align-items: left; margin-bottom: 20px; gap: 30px;">
            <div style="text-align: center;">
                Slot dello <br> {{ $agendaElement->data }}
            </div>
            <div style="text-align: center;">
                Orario <br> {{ $agendaElement->orario_inizio }}
            </div>
        </div>

        <div style="display: flex; align-items: left; margin-bottom: 20px; gap: 30px;">
            <div style="text-align: center;">
                Prestazione corrispondente <br> {{ $agendaElement->prestazione->nome }}
            </div>
            <div style="text-align: center;">
                Prenotato da <br> {{ $agendaElement->prenotazione->usernamePaziente }}
            </div>
        </div>

        <br>
        {{ $agendaElement->prestazione }}
        <br>
        {{ $agendaElement->prenotazione }}
    </div>
@endsection
