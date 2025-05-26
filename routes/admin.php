<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestazioneController;
use App\Http\Controllers\DipartimentoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;


Route::get('/admin/prestazioni', [PrestazioneController::class, 'show_prestazioni'])->name('prestazioni');

Route::get('/admin/getStaff', [UserController::class, 'getStaff'])->name('getStaff');

Route::get('/admin/dipartimenti', [DipartimentoController::class, 'getDipartimenti'])
    ->name('dipartimentiAdmin'); // mostra tutti i dipartimenti dinamicamente


