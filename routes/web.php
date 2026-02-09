<?php

use Illuminate\Support\Facades\Route;

// 1. Halaman Depan (Landing Page)
Route::get('/', function () {
    return view('landingpage');
});

// 2. Login: Tampilkan Form
Route::get('/login', function () {
    return view('login');
})->name('login');

// 3. Login: Proses Data (Saat tombol 'Masuk' diklik)
Route::post('/login', function () {
    return "Sedang memproses login...";
});

// 4. Register: Tampilkan Form
Route::get('/register', function () {
    return view('register');
})->name('register');

// 5. Register: Proses Data (Saat tombol 'Daftar' diklik) -- INI YANG BARU
Route::post('/register', function () {
    // Di sini nanti kita tulis kodingan simpan ke Database
    return "Sedang memproses pendaftaran user baru...";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/undangan', function () {
    return view('undangan');
})->name('undangan');

Route::get('/hasil', function () {
    return view('hasil');
})->name('hasil');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin dashboard');
