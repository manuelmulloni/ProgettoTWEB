@extends('layouts/skelet')


@section('content')
    <div class="container">
        <a href = " {{route('prestazioni')}}" class = "button" > Prestazioni</a>
    </div>

    <div class="container">
        <a href = "{{route('dipartimentiAdmin')}}" class = "button" > Dipartimenti</a>
    </div>
    <div class="container">
        <a href = "{{route('getStaff')}}" class = "button" > Staff</a>
    </div>
    <div class="container">
        <a href = "{{route('statistiche')}}" class = "button" >Statistiche</a>
    </div>
@endsection

