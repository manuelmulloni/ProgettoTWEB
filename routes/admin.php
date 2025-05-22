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


Route::get('/getDipartimenti', [UserController::class, 'getDipartimenti'])
    ->name('getDipartimenti');
Route::get('/getDipartimenti/{id}', [UserController::class, 'updateDepartment'])->name('dipartimenti.update');
Route::put('/getDipartimenti/{id}', [UserController::class, 'updateDepartment'])->name('dipartimenti.update');
Route::delete('/getDipartimenti/{id}', [UserController::class, 'deleteDepartment'])->name('dipartimenti.destroy');
Route::get('/getDipartimenti/create', [UserController::class, 'createDepartment'])->name('dipartimenti.create');
Route::post('/getDipartimenti', [UserController::class, 'createDepartment'])->name('dipartimenti.create');


Route::get('/getStaff', [UserController::class, 'getStaff'])
    ->name('getStaff');
