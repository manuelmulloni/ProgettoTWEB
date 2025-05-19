]<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DipartimentoController;

Route::get('/', function () {
    return view('primaview');
}) ->name('primaview');


Route::get('/dipartimenti', [DipartimentoController::class, 'getDipartimenti'])
    ->name('dipartimenti'); // mostra tutti i dipartimenti dinamicamente

require __DIR__ . '/dipartimenti.php'; // creare una view dinamica

//Route::get('/dipartimenti/show', [DipartimentoController::class, 'getDipendentiDipartimento']){
// })->name('dipSpec');   da vedere il funzionamento, crea una view dinamica del dipartimento specifico

Route::get('/login', function (){
    return view('auth/login');
})->name('login');

Route::get('registrazione', function (){
    return view('auth/registrazione');
})->name('registrazione');
