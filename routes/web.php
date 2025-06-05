<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestazioneController;
use App\Http\Controllers\DipartimentoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PrenotazioneController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;


/* --------------- BREEZE */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

/* --------------- PROGETTO */

Route::get('/', function () {
    return view('primaview');
}) ->name('primaview');


Route::get('/dipartimenti', [DipartimentoController::class, 'getDipartimenti'])
    ->name('dipartimenti'); // mostra tutti i dipartimenti dinamicamente

require __DIR__ . '/dipartimenti.php'; // creare una view dinamica

Route::get('/dipartimenti/{id}', [DipartimentoController::class, 'getDipendentiDipartimento'])
    ->name('dipSpec');  // da vedere il funzionamento, crea una view dinamica del dipartimento specifico

Route::get('api/notifications', [NotificationController::class, 'get_notifications'])
    ->name('notifications.get')
    ->middleware(['auth']);

Route::get('api/notifications_amount', [NotificationController::class, 'notificantion_amount'])
    ->name('notifications.amount')
    ->middleware(['auth']);

Route::get('ajax/descrizione-dipartimento/{id}', [DipartimentoController::class, 'ajaxDescrizioneDipartimento'])->name('getDescDip');

//Route::get('/prestazioni', [PrestazioneController::class, "show_prestazioni"])->name('prestazioni');
//questa rotta non serve più, ora è in admin.php

Route::get('/agenda', [AgendaController::class, 'show_agenda'])->name('agenda');
Route::post('/agenda/new', [AgendaController::class, 'create_agenda_element'])->name('agenda.create');
Route::delete('/agenda/delete/{id}', [AgendaController::class, 'delete_agenda_element'])->name('agenda.delete');

Route::get('/agenda/{id}', [AgendaController::class, 'show_agenda_element'])->name('agenda.show');
Route::delete('/agenda/cancel/{id}', [AgendaController::class, 'cancel_appointment'])->name('agenda.appointment.cancel');
Route::get('/agenda/new/{id}', [AgendaController::class, 'add_appointment'])->name('agenda.appointment.new');
Route::post('/agenda/new/{id}', [AgendaController::class, 'add_appointment_to_agenda'])->name('agenda.appointment.new');


// Routes for the PrestazioneController
Route::get('/prestazione/edit/{id}', [PrestazioneController::class, "show_edit_prestazione"])->name('prestazione.edit');
Route::post('/prestazione/edit/{id}', [PrestazioneController::class, "edit_prestazione"])->name('prestazione.edit');
Route::delete('/prestazione/delete/{id}', [PrestazioneController::class, "delete_prestazione"])->name('prestazione.delete');
Route::post('/prestazioni/new', [PrestazioneController::class, "create_prestazione"])->name('prestazione.create');
Route::get('/prestazioni/show', [PrestazioneController::class, "show_prestazioniCliente"])->name('prestazioni.show');
Route::get('/prestazione/{id}', [PrestazioneController::class, "show_prestazione_element"])->name('prestazione.info');

//Routes for PrenotazioneController
Route::get('/cliente/prenotazione/show', [PrenotazioneController::class, 'showPrenotazioniCliente'])->name('prenotazione.show');
Route::post('/cliente/prenotazione/new', [PrenotazioneController::class, 'createPrenotazione'])->name('prenotazione.create');
Route::get('/cliente/prenotazione/prestazione-autocomplete', [PrestazioneController::class, 'autocomplete'])->name('prestazione.autocomplete');
Route::get('/cliente/prestazioni/{dipartimento}', [PrenotazioneController::class, 'getPrestazioni'])->name('prestazioni.dipartimento');
Route::post('/cliente/prenotazioni/store', [PrenotazioneController::class, 'store'])->name('prenotazioni.store');


Route::get('/user/edit', [UserController::class, 'showEditUser'])->name('user.edit');
Route::post('/user/edit', [UserController::class, 'editUser'])->name('user.update');


// Routes for the admin area
Route::get('/admin', function () {
    return view('admin.area_admin');
})->middleware(['auth', 'isAdmin'])->name('admin');

// Routes for the staff area
Route::get('/staff', function () {
    return view('staff.area_staff');
})->middleware(['auth', 'isStaff'])->name('staff');

// Routes for the cliente area
Route::get('/cliente', function () {
    return view('utenti.area_Utente');
})->middleware(['auth', 'isCliente'])->name('cliente');


