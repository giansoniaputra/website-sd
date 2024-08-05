<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

// ROUTE UNTUK HALAMAN LANDING PAGE
Route::get('/landing', [LandingPageController::class, 'index'])->name('landing');
Route::get('/landing/profil', [LandingPageController::class, 'profil']);
// Route::get('/landing/contact', [LandingPageController::class, 'contact']);
