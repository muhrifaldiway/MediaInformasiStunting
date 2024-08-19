<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\RegisteredUserController;

// Route Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/homeArtikel/{judul}', [HomeController::class, 'show'])->name('homeArtikel.show');    
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::post('/komentar', [KomentarController::class, 'store']);

// Routes Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes Registrasi
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Group middleware 'auth' untuk melindungi rute-rute yang memerlukan otentikasi
Route::middleware(['auth'])->group(function () {

    Route::middleware(RoleMiddleware::class . ':masyarakat')->group(function () {
        Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');
        Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');
        Route::get('/konsultasi/{konsultasi}/edit', [KonsultasiController::class, 'edit'])->name('konsultasi.edit');
        Route::put('/konsultasi/{konsultasi}', [KonsultasiController::class, 'update'])->name('konsultasi.update');
        Route::delete('/konsultasi/{konsultasi}', [KonsultasiController::class, 'destroy'])->name('konsultasi.destroy');
    });

    // Rute untuk petugas
    Route::middleware(RoleMiddleware::class . ':petugas')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

        // User routes
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa');
        Route::post('/diagnosa', [DiagnosaController::class, 'store'])->name('diagnosa.store');
        Route::put('/diagnosa/{id}', [DiagnosaController::class, 'update'])->name('diagnosa.update');
        Route::delete('/diagnosa/{diagnosa}', [DiagnosaController::class, 'destroy'])->name('diagnosa.destroy');

        // Artikel routes
        Route::get('/artikels', [ArtikelController::class, 'index'])->name('artikels.index');
        Route::get('/artikels/create', [ArtikelController::class, 'create'])->name('artikels.create');
        Route::post('/artikels', [ArtikelController::class, 'store'])->name('artikels.store');
        Route::get('/artikels/{id}/edit', [ArtikelController::class, 'edit'])->name('artikels.edit');
        Route::put('/artikels/{id}', [ArtikelController::class, 'update'])->name('artikels.update');
        Route::delete('/artikels/{artikel}', [ArtikelController::class, 'destroy'])->name('artikels.destroy');
        Route::get('/artikel/{judul}', [ArtikelController::class, 'show'])->name('artikels.show');

        // Authors routes
        Route::get('/authors/{user}', function (User $user) {
            return view('artikels.index', [
                'title' => 'Articles by ' . $user->name,
                'artikels' => $user->artikels
            ]);
        })->name('authors.show');

        // Route Komentar
        Route::get('/komentars', [KomentarController::class, 'index'])->name('komentars.index');
        Route::get('/komentar/create', [KomentarController::class, 'create']);
        Route::get('/komentars/{id}', [KomentarController::class, 'show'])->name('komentars.show');
        Route::delete('/komentars/{komentar}', [KomentarController::class, 'destroy'])->name('komentars.destroy');

        // Kategori routes
        Route::get('/kategoriArtikel', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
        Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    });
});
