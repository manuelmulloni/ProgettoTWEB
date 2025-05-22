<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestazioneController;
use App\Http\Controllers\DipartimentoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;

Route::get('/getPrestazioni', [UserController::class, 'getPrestazioni'])
    ->name('getPrestazioni');

Route::get('/getPrestazioni/{id}', [UserController::class, 'updatePrestazioni'])->name('prestazioni.update');

Route::put('/getPrestazioni/{id}', [UserController::class, 'updatePrestazioni'])->name('prestazioni.update');

Route::delete('/getPrestazioni/{id}', [UserController::class, 'deletePrestazioni'])->name('prestazioni.destroy');

Route::get('/getPrestazioni/create', [UserController::class, 'createPrestazioni'])->name('prestazioni.create');
Route::post('/getPrestazioni', [UserController::class, 'createPrestazioni'])->name('prestazioni.create');
