<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PrestazioneController;
use App\Http\Controllers\DipartimentoController;

Route::get('/', function () {
    return view('primaview');
}) ->name('primaview');


Route::get('/dipartimenti', [DipartimentoController::class, 'getDipartimenti'])
    ->name('dipartimenti'); // mostra tutti i dipartimenti dinamicamente

require __DIR__ . '/dipartimenti.php'; // creare una view dinamica

//Route::get('/dipartimenti/show', [DipartimentoController::class, 'getDipendentiDipartimento']){
// })->name('dipSpec');   da vedere il funzionamento, crea una view dinamica del dipartimento specifico

Route::get('/agenda', [AgendaController::class, 'show_agenda'])->name('agenda');
Route::post('/agenda/new', [AgendaController::class, 'create_agenda_element'])->name('agenda.create');
Route::get('/agenda/delete/{id}', [AgendaController::class, 'delete_agenda_element'])->name('agenda.delete');

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
