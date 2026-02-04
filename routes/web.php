<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {
    return "Logika login akan dibuat di sini nanti.";
})->name('login');


