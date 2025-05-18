@extends('layouts/skelet')

@section('content')
    <h1>Prestazioni</h1>
    @foreach ($prestazioni as $prestazione)
        {{ var_dump($prestazione) }}
    @endforeach
@endsection
