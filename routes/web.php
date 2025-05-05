<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('primaview');
}) ->name('primaview');


Route::get('/dipartimenti', function () {
    return view('dipartimenti');
})->name('dipartimenti');

Route::get('/cardiologia', function () {
    return view('cardiologia');
})->name('cardiologia');

Route::get('/dermatologia', function () {
    return view('dermatologia');
})->name('dermatologia');

Route::get('/oculistica', function () {
    return view('oculistica');
})->name('oculistica');

Route::get('/login', function (){
    return view('auth/login');
})->name('login');

Route::get('registrazione', function (){
    return view('auth/registrazione');
})->name('registrazione');
