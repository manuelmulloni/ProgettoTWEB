@extends('layouts/skelet')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="username">Username</label>
            <input id="username" name="username" type="text" required autofocus />

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required />

            <label>
                <input type="checkbox" name="remember" /> Remember me
            </label>
            <br>
            <button type="submit" class="button-style submit-button">Log in</button>
        </form>
    </div>
@endsection
