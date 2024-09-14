<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScholarshipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//pendaftaran beasiswa
Route::get('/pendaftaran-beasiswa', [ScholarshipController::class, 'index'])->name('scholarship.index');
Route::post('/pendaftaran-beasiswa/kirim', [ScholarshipController::class, 'store'])->name('scholarship.store');
Route::get('/hasil-pendaftaran-beasiswa', [ScholarshipController::class, 'result'])->name('result-scholarship.index');
