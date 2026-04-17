<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// ── Halaman utama redirect ke login ──
Route::get('/', function () {
    return redirect()->route('login');
});

// ── Auth ──
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ── Dashboard Admin (middleware: auth + role admin) ──
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        abort_unless(auth()->user()->role === 'admin', 403);
        return view('admin.dashboard');
    })->name('dashboard');
});

// ── Dashboard Guru (middleware: auth + role guru) ──
Route::middleware(['auth'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', function () {
        abort_unless(auth()->user()->role === 'guru', 403);
        return view('guru.dashboard');
    })->name('dashboard');
});
