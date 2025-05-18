<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestazioneController;

Route::get('/', function () {
    return view('primaview');
}) ->name('primaview');


Route::get('/dipartimenti', function () {
    return view('dipartimenti');
})->name('dipartimenti');

require __DIR__ . '/dipartimenti.php';

Route::get('/prestazioni', [PrestazioneController::class, "show_prestazioni"])->name('prestazioni');

Route::get('/login', function (){
    return view('auth/login');
})->name('login');

Route::get('registrazione', function (){
    return view('auth/registrazione');
})->name('registrazione');