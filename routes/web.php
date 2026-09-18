<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortalOrtuController;
use App\Http\Controllers\PortalSiswaController;
use App\Http\Controllers\GuruController;

// ===================== PUBLIC ROUTES =====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/profil/{section}', [ProfilController::class, 'index'])->name('profil.section');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb/daftar', [PpdbController::class, 'store'])->name('ppdb.daftar.post');
Route::get('/ppdb/bukti/{no_pendaftaran}', [PpdbController::class, 'bukti'])->name('ppdb.bukti');
Route::post('/ppdb/cek-status', [PpdbController::class, 'cekStatus'])->name('ppdb.cek.post');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');

// ===================== PORTAL HUB (halaman portal terpadu) =====================
Route::get('/portal', function () {
    return view('portal-hub');
})->name('portal');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================== ADMIN =====================
Route::get('/admin/login', [AuthController::class, 'adminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Guru CRUD
    Route::post('/guru', [AdminController::class, 'storeGuru'])->name('admin.guru.store');
    Route::put('/guru/{id}', [AdminController::class, 'updateGuru'])->name('admin.guru.update');
    Route::delete('/guru/{id}', [AdminController::class, 'destroyGuru'])->name('admin.guru.destroy');

    // Berita CRUD
    Route::post('/berita', [AdminController::class, 'storeBerita'])->name('admin.berita.store');
    Route::put('/berita/{id}', [AdminController::class, 'updateBerita'])->name('admin.berita.update');
    Route::delete('/berita/{id}', [AdminController::class, 'destroyBerita'])->name('admin.berita.destroy');

    // Galeri CRUD
    Route::post('/galeri', [AdminController::class, 'storeGaleri'])->name('admin.galeri.store');
    Route::put('/galeri/{id}', [AdminController::class, 'updateGaleri'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [AdminController::class, 'destroyGaleri'])->name('admin.galeri.destroy');

    // Profil Update
    Route::post('/profil', [AdminController::class, 'updateProfil'])->name('admin.profil.update');

    // Jurusan CRUD
    Route::post('/jurusan', [AdminController::class, 'storeJurusan'])->name('admin.jurusan.store');
    Route::put('/jurusan/{id}', [AdminController::class, 'updateJurusan'])->name('admin.jurusan.update');
    Route::delete('/jurusan/{id}', [AdminController::class, 'destroyJurusan'])->name('admin.jurusan.destroy');

    // PPDB Management
    Route::get('/ppdb-pendaftar', [AdminController::class, 'ppdbIndex'])->name('admin.ppdb.index');
    Route::patch('/ppdb-pendaftar/{id}/status', [AdminController::class, 'updatePpdbStatus'])->name('admin.ppdb.updateStatus');
    Route::delete('/ppdb-pendaftar/{id}', [AdminController::class, 'destroyPpdb'])->name('admin.ppdb.destroy');
});

// ===================== PORTAL ORANG TUA =====================
Route::get('/portal-ortu', [AuthController::class, 'ortuLoginForm'])->name('portal.ortu.login');
Route::post('/portal-ortu/login', [AuthController::class, 'ortuLogin'])->name('portal.ortu.login.post');
Route::middleware('role:ortu')->prefix('portal-ortu')->group(function () {
    Route::get('/dashboard', [PortalOrtuController::class, 'dashboard'])->name('portal.ortu.dashboard');
});

// ===================== PORTAL SISWA =====================
Route::get('/portal-siswa', [AuthController::class, 'siswaLoginForm'])->name('portal.siswa.login');
Route::post('/portal-siswa/login', [AuthController::class, 'siswaLogin'])->name('portal.siswa.login.post');
Route::middleware('role:siswa')->prefix('portal-siswa')->group(function () {
    Route::get('/dashboard', [PortalSiswaController::class, 'dashboard'])->name('portal.siswa.dashboard');
});
