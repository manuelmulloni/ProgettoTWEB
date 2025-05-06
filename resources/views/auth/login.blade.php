@extends('layouts/skelet')

@section('content')
    <div class="login-container">
        <h2>Accedi</h2>
        <form action="/login" method="post">
            <input type="text" name="username" placeholder="Nome utente" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="login-footer">
            <p>Non hai un account? <a href="{{route('registrazione')}}">Registrati</a></p>
        </div>
    </div>

@endsection
