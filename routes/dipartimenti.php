<?php

use Illuminate\Support\Facades\Route;

Route::get('/cardiologia', function () {
    return view('cardiologia');
})->name('cardiologia');

Route::get('/dermatologia', function () {
    return view('dermatologia');
})->name('dermatologia');

Route::get('/oculistica', function () {
    return view('oculistica');
})->name('oculistica');

Route::get('/ortopedia', function () {
    return view('ortopedia');
})->name('ortopedia');

Route::get('/pediatria', function () {
    return view('pediatria');
})->name('pediatria');

Route::get('/radiologia', function () {
    return view('radiologia');
})->name('radiologia');
