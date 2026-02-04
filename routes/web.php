<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', function () {
    return "Logika login akan dibuat di sini nanti.";
})->name('login');

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/register', function () {
    return view('register');
});