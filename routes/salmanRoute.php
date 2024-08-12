<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

// ROUTE UNTUK HALAMAN LANDING PAGE
Route::get('/landing', [LandingPageController::class, 'index'])->name('landing');
Route::get('/landing/profilSekolah', [LandingPageController::class, 'profilSekolah']);
Route::get('/landing/profilYayasan', [LandingPageController::class, 'profilYayasan']);
