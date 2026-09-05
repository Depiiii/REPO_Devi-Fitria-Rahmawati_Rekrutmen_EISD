<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KerjaanController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return redirect('/login');
});


Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');


Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::resource('/admin/kategori', KategoriController::class)
    ->middleware(['auth', 'role:admin']);

Route::resource('/admin/user', UserController::class)
    ->middleware(['auth', 'role:admin']);




Route::get('/mahasiswa/dashboard', [DashboardController::class, 'mahasiswa'])
    ->middleware(['auth', 'role:mahasiswa'])
    ->name('mahasiswa.dashboard');

Route::get('/mahasiswa/kerjaan', [KerjaanController::class, 'index'])
    ->middleware(['auth', 'role:mahasiswa']);

Route::get('/mahasiswa/kelola-kerjaan', [KerjaanController::class, 'myJobs'])
    ->middleware(['auth', 'role:mahasiswa']);


Route::get('/mahasiswa/kerjaan/create', [KerjaanController::class, 'create'])
    ->middleware(['auth', 'role:mahasiswa']);

Route::post('/mahasiswa/kerjaan', [KerjaanController::class, 'store'])
    ->middleware(['auth', 'role:mahasiswa']);


Route::get('/mahasiswa/kerjaan/{kerjaan}/edit', [KerjaanController::class, 'edit'])
    ->middleware(['auth', 'role:mahasiswa']);

Route::put('/mahasiswa/kerjaan/{kerjaan}', [KerjaanController::class, 'update'])
    ->middleware(['auth', 'role:mahasiswa']);


Route::delete('/mahasiswa/kerjaan/{kerjaan}', [KerjaanController::class, 'destroy'])
    ->middleware(['auth', 'role:mahasiswa']);


Route::post('/mahasiswa/kerjaan/{kerjaan}/selesai', [KerjaanController::class, 'selesai'])
    ->middleware(['auth', 'role:mahasiswa']);

// Form lamaran
Route::get('/mahasiswa/kerjaan/{kerjaan}/lamar', [LamaranController::class, 'create'])
    ->middleware(['auth', 'role:mahasiswa']);

// Kirim lamaran
Route::post('/mahasiswa/kerjaan/{kerjaan}/lamar', [LamaranController::class, 'store'])
    ->middleware(['auth', 'role:mahasiswa']);

// Lamaran saya
Route::get('/mahasiswa/lamaran', [LamaranController::class, 'index'])
    ->middleware(['auth', 'role:mahasiswa']);

// Lihat pelamar
Route::get('/mahasiswa/kerjaan/{kerjaan}/lamaran', [LamaranController::class, 'pelamar'])
    ->middleware(['auth', 'role:mahasiswa']);

Route::post('/mahasiswa/lamaran/{lamaran}/accept', [LamaranController::class, 'accept'])
    ->middleware(['auth', 'role:mahasiswa']);

Route::post('/mahasiswa/lamaran/{lamaran}/reject', [LamaranController::class, 'reject'])
    ->middleware(['auth', 'role:mahasiswa']);

// Form ulasan
Route::get('/mahasiswa/kerjaan/{kerjaan}/ulasan/create', [UlasanController::class, 'create'])
    ->middleware(['auth', 'role:mahasiswa']);

// Simpan ulasan
Route::post('/mahasiswa/kerjaan/{kerjaan}/ulasan', [UlasanController::class, 'store'])
    ->middleware(['auth', 'role:mahasiswa']);

    Route::middleware(['auth'])->group(function () {

    Route::get(
        '/profil',
        [ProfileController::class, 'index']
    )->name('profil');

    Route::post(
        '/profil/update',
        [ProfileController::class, 'update']
    );

    Route::post(
        '/profil/password',
        [ProfileController::class, 'updatePassword']
    );

});
