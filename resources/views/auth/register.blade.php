@extends('layouts/skelet')

@section('content')
    <div class="container">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Username -->
        <div class="container">
            <label for="username" class="block text-gray-700 font-semibold mb-1">Username</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('username')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Profile Picture -->
        <div class="container">
            <label for="profile_picture" class="block text-gray-700 font-semibold mb-1">Immagine Profile</label>
            <input id="profile_picture" type="file" name="profile_picture" accept="image/*" class="w-full" />
            <small class="text-gray-500">Massimo 4MB</small>
            @error('profile_picture')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nome -->
        <div class="container">
            <label for="nome" class="block text-gray-700 font-semibold mb-1">Nome</label>
            <input id="nome" type="text" name="nome" value="{{ old('nome') }}" required autocomplete="nome" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('nome')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Cognome -->
        <div class="container">
            <label for="cognome" class="block text-gray-700 font-semibold mb-1">Cognome</label>
            <input id="cognome" type="text" name="cognome" value="{{ old('cognome') }}" required autocomplete="cognome" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('cognome')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Data di Nascita -->
        <div class="container">
            <label for="dataNascita" class="block text-gray-700 font-semibold mb-1">Data di Nascita</label>
            <input id="dataNascita" type="date" name="dataNascita" value="{{ old('dataNascita') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('dataNascita')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Telefono -->
        <div class="container">
            <label for="telefono" class="block text-gray-700 font-semibold mb-1">Telefono</label>
            <input id="telefono" type="tel" name="telefono" value="{{ old('telefono') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('telefono')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Indirizzo -->
        <div class="container">
            <label for="indirizzo" class="block text-gray-700 font-semibold mb-1">Indirizzo</label>
            <input id="indirizzo" type="text" name="indirizzo" value="{{ old('indirizzo') }}" required autocomplete="indirizzo" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('indirizzo')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="container">
            <label for="password" class="block text-gray-700 font-semibold mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="container">
            <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('password_confirmation')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-900 underline">Already registered?</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                Register
            </button>
        </div>
    </form>
@endsection
