<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\KontakController;

/*
|--------------------------------------------------------------------------
| Web Routes - Website Profil Sekolah (Tanpa Sistem Login)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/profil/{section}', [ProfilController::class, 'index'])->name('profil.section');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

use App\Http\Controllers\PortalController;
Route::get('/portal-ortu', [PortalController::class, 'ortu'])->name('portal.ortu');
Route::get('/portal-siswa', [PortalController::class, 'siswa'])->name('portal.siswa');

