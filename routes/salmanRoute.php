<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

// ROUTE UNTUK HALAMAN LANDING PAGE
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/landing/profilSekolah', [LandingPageController::class, 'profilSekolah']);
Route::get('/landing/profilYayasan', [LandingPageController::class, 'profilYayasan']);
Route::get('/landing/wakasek', [LandingPageController::class, 'wakasek']);
Route::get('/landing/guru', [LandingPageController::class, 'guru']);
Route::get('/landing/ppdb', [LandingPageController::class, 'ppdb']);
Route::get('/landing/layanan', [LandingPageController::class, 'layanan']);
Route::get('/landing/berita', [LandingPageController::class, 'berita']);
Route::get('/landing/galeri', [LandingPageController::class, 'galeri']);
Route::get('/renderSiswa', [LandingPageController::class, 'renderSiswa']);