<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('primaview');
}) ->name('primaview');


Route::get('/dipartimenti', function () {
    return view('dipartimenti');
})->name('dipartimenti');

require __DIR__ . '/dipartimenti.php';

Route::get('/login', function (){
    return view('auth/login');
})->name('login');

Route::get('registrazione', function (){
    return view('auth/registrazione');
})->name('registrazione');