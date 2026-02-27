<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // <--- Pastikan ini ada!
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KandidatController;



//ROUTES UMUM
Route::get('/', function () { return view('landingpage'); });

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Typo loguot diperbaiki

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');




// ROUTES KANDIDAT
Route::middleware(['auth'])->group(function () {

    // Halaman Menu Kandidat
    Route::get('/dashboard', [KandidatController::class, 'dashboard'])->name('dashboard');

    // PENTING: Arahkan langsung ke Controller, BUKAN ke function() return view
    Route::get('/undangan', [KandidatController::class, 'undangan'])->name('undangan');

    Route::get('/hasil', function () { return view('hasil'); })->name('hasil');

    // Sistem Ujian Kandidat (Verifikasi, Mengerjakan, Submit)
    Route::post('/kandidat/assessment/{id}/verify', [KandidatController::class, 'verifyToken'])->name('kandidat.verify_token');
    Route::get('/kandidat/assessment/{id}/kerjakan', [KandidatController::class, 'kerjakanTes'])->name('kandidat.kerjakan_tes');
    Route::post('/kandidat/assessment/{id}/submit', [KandidatController::class, 'submitTes'])->name('kandidat.submit_tes');

});



/// RUTE ADMIN
Route::middleware(['auth'])->group(function () { // Anda bisa menambahkan middleware 'role:admin' jika ada

    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Manajemen Kandidat
    Route::get('/admin/daftar-kandidat', [AdminController::class, 'daftarKandidat'])->name('admin.daftar_kandidat');
    Route::get('/admin/kandidat/{id}', [AdminController::class, 'detailKandidat'])->name('admin.kandidat.detail');
    Route::get('/admin/kandidat/{user_id}/assessment/{assessment_id}', [AdminController::class, 'reviewAssessment'])->name('admin.kandidat.review');

    // Manajemen Assessment (Modul)
    Route::get('/admin/buat-assesment', function () { return view('admin.buat_assesment'); })->name('buat assesment');
    Route::post('/admin/assessment/store', [AdminController::class, 'storeAssessment'])->name('admin.assessment.store');
    Route::get('/admin/assessment/{id}/edit', [AdminController::class, 'editAssessment'])->name('admin.assessment.edit');
    Route::put('/admin/assessment/{id}/update', [AdminController::class, 'updateAssessment'])->name('admin.assessment.update');
    Route::delete('/admin/assessment/{id}', [AdminController::class, 'destroyAssessment'])->name('admin.assessment.destroy');

    // Manajemen Soal (Pertanyaan)
    Route::get('/admin/assessment/{id}/buat-pertanyaan', [AdminController::class, 'buatPertanyaan'])->name('admin.buat_pertanyaan');
    Route::post('/admin/assessment/{id}/question/store', [AdminController::class, 'storeQuestion'])->name('admin.question.store');
    Route::delete('/admin/question/{id}', [AdminController::class, 'destroyQuestion'])->name('admin.question.destroy');

    // Kirim Undangan Assessment ke Kandidat
    Route::post('/admin/kirim-undangan/{user_id}/{assessment_id}', [AdminController::class, 'kirimUndangan'])->name('admin.kirim.undangan');

});


