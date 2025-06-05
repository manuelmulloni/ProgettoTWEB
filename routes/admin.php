<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestazioneController;
use App\Http\Controllers\DipartimentoController;
use App\Http\Controllers\AssegnazioniPrestazioniController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;


Route::get('/admin/prestazioni', [PrestazioneController::class, 'show_prestazioni'])->name('prestazioni');

Route::get('/admin/getStaff', [UserController::class, 'getStaff'])->name('getStaff');

Route::get('/admin/dipartimenti', [DipartimentoController::class, 'getDipartimenti'])
    ->name('dipartimentiAdmin'); // mostra tutti i dipartimenti dinamicamente

Route::post('/admin/dipartimento/new', [DipartimentoController::class, 'newDipartimento'])->name('dipartimento.create');
Route::delete('/admin/dipartimento/cancella/{id}', [DipartimentoController::class, 'cancellaDipartimento'])->name('dipartimento.cancella');
Route::get('/admin/dipartimento/edit/{id}', [DipartimentoController::class, 'show_Modifica_Dipartimento'])->name('dipartimento.modifica');
Route::post('/admin/dipartimento/edit/{id}', [DipartimentoController::class, 'modificaDipartimento'])->name('dipartimento.modifica');

Route::get('/admin/statistiche',function (){
    return view('admin.statistiche');
})->name('statistiche');

Route::get('/admin/prestazioni/byCliente', [PrestazioneController::class, 'statsByCliente'])
    ->name('stat.Cliente');
Route::get('/admin/prestazioni/byDipartimento', [PrestazioneController::class, 'statsByDip'])
    ->name('stat.Dipartimento');
Route::get('/admin/prestazioni/byPrestazione', [PrestazioneController::class, 'statsByPrestazione'])
    ->name('stat.Prestazione');

Route::post('/admin/staff/prestazioni', [AssegnazioniPrestazioniController::class, 'updatePrestazioni'])
    ->name('admin.staff.updatePrestazioni');