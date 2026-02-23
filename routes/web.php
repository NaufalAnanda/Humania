<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // <--- Pastikan ini ada!
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KandidatController;

//user
Route::get('/', function () { return view('landingpage'); });
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::post('/loguot', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

Route::get('/dashboard', [KandidatController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/undangan', function () { return view('undangan'); })->name('undangan');
Route::get('/hasil', function () { return view('hasil'); })->name('hasil');

// Dashboard Admin
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

// Arahkan ke AdminController method 'index'
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Daftar Kandidat
Route::get('/admin/daftar-kandidat', function () {
    return view('admin.daftar_kandidat');
})->name('daftar kandidat');

Route::get('/admin/daftar-kandidat', [AdminController::class, 'daftarKandidat'])
    ->name('admin.daftar.kandidat');

// Buat Assesment (Formulir)
Route::get('/admin/buat-assesment', function () {
    return view('admin.buat_assesment');
})->name('buat assesment');

// --- PENTING: INI JALUR SIMPAN DATA (POST) ---
// Perhatikan URL-nya ada '/admin/'-nya agar konsisten
Route::post('/admin/assessment/store', [AdminController::class, 'storeAssessment'])
    ->name('admin.assessment.store');

// Rute untuk Hapus Assessment
Route::delete('/admin/assessment/{id}', [AdminController::class, 'destroyAssessment'])
    ->name('admin.assessment.destroy');

// 1. TAMPILKAN FORM EDIT
Route::get('/admin/assessment/{id}/edit', [AdminController::class, 'editAssessment'])
    ->name('admin.assessment.edit');

// 2. PROSES UPDATE DATA (PUT)
Route::put('/admin/assessment/{id}/update', [AdminController::class, 'updateAssessment'])
    ->name('admin.assessment.update');

// Buat Pertanyaan (Halaman Kelola Soal)
Route::get('/admin/assessment/{id}/buat-pertanyaan', [AdminController::class, 'buatPertanyaan'])
    ->name('admin.buat_pertanyaan');

Route::post('/admin/assessment/{id}/question/store', [AdminController::class, 'storeQuestion'])
    ->name('admin.question.store');

Route::delete('/admin/question/{id}', [AdminController::class, 'destroyQuestion'])
    ->name('admin.question.destroy');

// Rute untuk memproses pengecekan token
Route::post('/kandidat/assessment/{id}/verify', [App\Http\Controllers\KandidatController::class, 'verifyToken'])->name('kandidat.verify_token');

// Rute halaman ujian (Sebagai contoh/placeholder saat token benar)
Route::get('/kandidat/assessment/{id}/kerjakan', [App\Http\Controllers\KandidatController::class, 'kerjakanTes'])->name('kandidat.kerjakan_tes');

// Rute untuk menerima kiriman jawaban ujian dari Kandidat
Route::post('/kandidat/assessment/{id}/submit', [App\Http\Controllers\KandidatController::class, 'submitTes'])->name('kandidat.submit_tes');

// Cari baris ini di routes/web.php Anda
Route::get('/admin/daftar-kandidat', [App\Http\Controllers\AdminController::class, 'daftarKandidat'])
    ->name('admin.daftar_kandidat'); // <-- TAMBAHKAN NAMA RUTE INI DI UJUNGNYA

// Rute untuk melihat detail hasil tes dari satu kandidat
Route::get('/admin/kandidat/{id}', [App\Http\Controllers\AdminController::class, 'detailKandidat'])
    ->name('admin.kandidat.detail'); // <-- Nama ini yang dicari oleh sistem

// Rute untuk melihat detail HASIL PER MODUL dari seorang kandidat (Analisis AI & Jawaban)
Route::get('/admin/kandidat/{user_id}/assessment/{assessment_id}', [App\Http\Controllers\AdminController::class, 'reviewAssessment'])
    ->name('admin.kandidat.review');

// Rute untuk mengirim email undangan
Route::post('/admin/kirim-undangan/{user_id}/{assessment_id}', [\App\Http\Controllers\AdminController::class, 'kirimUndangan'])
    ->name('admin.kirim.undangan');

