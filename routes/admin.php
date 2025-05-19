<?php



Route::get('/getPrestazioni', [UserController::class, 'getPrestazioni'])
    ->name('getPrestazioni');
