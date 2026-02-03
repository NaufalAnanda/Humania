<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', function () {
    return "Logika login akan dibuat di sini nanti.";
})->name('login');

Route::get('dashboard', function () {
    return view('dashboard');
});