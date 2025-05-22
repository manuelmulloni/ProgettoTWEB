@extends('layouts/skelet')


@section('content')
    <div class="container">
        <a href = " {{route('getPrestazioni')}}" class = "button" > Prestazioni</a>
    </div>

    <div class="container">
        <a href = "{{route('getDipartimenti')}}" class = "button" > Dipartimenti</a>
    </div>
    <div class="container">
        <a href = "{{route('getStaff')}}" class = "button" > Staff</a>
    </div>
@endsection

