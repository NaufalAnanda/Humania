<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ==========================================================
    // 1. REGISTER (DAFTAR)
    // ==========================================================

    // Menampilkan Form Register
    public function showRegister()
    {
        return view('register');
    }

    // Memproses Data Register
    public function processRegister(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Simpan User Baru (Otomatis jadi Kandidat)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi Password
            'role' => 'kandidat', // Role default
        ]);

        // Redirect ke Halaman Login
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ==========================================================
    // 2. LOGIN (MASUK)
    // ==========================================================

    // Menampilkan Form Login
    public function showLogin()
    {
        return view('login');
    }

    // Memproses Login
    public function processLogin(Request $request)
    {
        // Validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah email & password benar?
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek Role: Admin ke Dashboard Admin, Kandidat ke Dashboard User
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard');
        }

        // Jika Salah
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // ==========================================================
    // 3. LOGOUT (KELUAR)
    // ==========================================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
