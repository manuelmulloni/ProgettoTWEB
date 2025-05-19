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
Route::get('/prestazione/edit/{id}', [PrestazioneController::class, "show_edit_prestazione"])->name('prestazione.edit');
Route::post('/prestazione/edit/{id}', [PrestazioneController::class, "edit_prestazione"])->name('prestazione.edit');
Route::get('/prestazione/delete/{id}', [PrestazioneController::class, "delete_prestazione"])->name('prestazione.delete');
Route::post('/prestazioni/new', [PrestazioneController::class, "create_prestazione"])->name('prestazione.create');


Route::get('/login', function (){
    return view('auth/login');
})->name('login');

Route::get('registrazione', function (){
    return view('auth/registrazione');
})->name('registrazione');