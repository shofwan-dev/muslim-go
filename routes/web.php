<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\DoaController;
use App\Http\Controllers\DzikirController;
use App\Http\Controllers\AsmaulHusnaController;
use App\Http\Controllers\HadithController;

Route::get('/', function () {
    return view('home');
});

Route::view('/quran', 'quran');
Route::view('/doa', 'doa');
Route::view('/almatsurat', 'almatsurat');
Route::view('/asmaulhusna', 'asmaulhusna');
Route::view('/hadits', 'hadits');
Route::view('/qibla', 'qibla');
Route::view('/blog', 'blog');

Route::get('/quran', [QuranController::class, 'index']);
Route::get('/quran/{id}', [QuranController::class, 'show']);

Route::get('/doa', [DoaController::class, 'index'])->name('doa.index');
Route::get('/doa/{id}', [DoaController::class, 'show'])->name('doa.show');

Route::get('/dzikir', [DzikirController::class, 'index'])->name('dzikir.index');

Route::get('/asmaulhusna', [AsmaulHusnaController::class, 'index'])->name('asmaulhusna.index');

Route::get('/hadits', [HadithController::class, 'index'])->name('hadits.index');
Route::get('/hadits/{slug}', [HadithController::class, 'show'])->name('hadits.show');
Route::get('/hadits/{slug}/search', [HadithController::class, 'search'])->name('hadits.search');