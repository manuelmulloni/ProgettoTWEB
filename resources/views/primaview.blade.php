@extends('layouts/skelet')

@section('content')
    <h1>Benvenuti nel sito del Poliambulatorio Salus</h1>
        <p>La nostra missione è fornire i migliori servizi ai nostri clienti</p>
    <img src="{{ asset('storage/immagini/immagine.jpg') }}" alt="Immagine Poliambulatorio" style="width: 100%; height: auto;">


    <h2>La nostra posizione</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10654.264953867845!2d13.513999989616215!3d43.585141077752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d80239b2afbe3%3A0x3a016e41e6f4a48c!2sUNIVPM%20-%20Dipartimento%20di%20Scienze%20Agrarie%2C%20Alimentari%20ed%20Ambientali!5e0!3m2!1sit!2sit!4v1746536679183!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

@endsection




