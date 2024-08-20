<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DetailBeritaController;

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
Route::get('/detailBerita/{slug}', [DetailBeritaController::class, 'show'])->name('detailBerita.show');
Route::get('/landing/layoutLanding/footerLanding', [LandingPageController::class, 'footer']);


// Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

// Tambahkan route untuk halaman detail berita
// Route::get('/landing/detailBerita/{slug}', [PostController::class, 'show'])->name('news.show');