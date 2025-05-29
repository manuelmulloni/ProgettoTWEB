@extends('layouts/skelet')

@section('content')

 <h2>Filtro tabella</h2>
  <input type="text" id="filtro" placeholder="Cerca nella tabella...">

  <script>
    document.getElementById('filtro').addEventListener('keyup', function() {
      const filtro = this.value.toLowerCase();
      const righe = document.querySelectorAll('#tabella tbody tr');

      righe.forEach(riga => {
        const testoRiga = riga.textContent.toLowerCase();
        riga.style.display = testoRiga.includes(filtro) ? '' : 'none';
      });
    });
  </script>
  
    <div class="content">
            <table id='tabella'>
                <thead>
                <tr>
                    <th>Nome Prestazione</th>
                    <th>Dipartimento</th>
                    <th>Medico</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($prestazioni as $prestazione)
                    <tr>
                        <td>{{ $prestazione->nome }}</td>
                        <td>{{ $prestazione->dipartimento->nome }}</td>
                        <td>{{ $prestazione->medico }}</td>
                        <td><a href="{{route('prestazione.info',$prestazione->id)}}">Prenota</a></td>
                        <!-- metodi modifica o elimina prenotazione -->
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection

