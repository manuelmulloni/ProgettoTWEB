@extends('layouts/skelet')

@section('content')

    <div class="container">
        <h2>Registrati</h2>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="username" placeholder="Nome utente" required>
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="cognome" placeholder="Cognome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Registrati</button>
        </form>
        <div class="login-footer">
            <p>Hai già un account? <a href="/login">Accedi</a></p>
        </div>
    </div>
@endsection
