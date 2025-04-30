<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('primaview');
});


Route::get('/dipartimenti', function () {
    return view('dipartimenti');
})->name('dipartimenti');

