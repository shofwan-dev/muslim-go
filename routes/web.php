<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\DoaController;

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
