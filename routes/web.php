<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\DiakController;
use App\Http\Controllers\TargyController;
use App\Http\Controllers\JegyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Csak bejelentkezett felhasználóknak
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/uzenetek', function () {
        return view('uzenetek');
    })->name('uzenetek');

    Route::get('/adatbazis', [AdatbazisController::class, 'index'])->name('adatbazis');

    // ✅ Ezek hozzák működésbe a "Megnyitás" gombokat:
    Route::get('/diak', [DiakController::class, 'index'])->name('diak');
    Route::get('/targy', [TargyController::class, 'index'])->name('targy');
    Route::get('/jegy', [JegyController::class, 'index'])->name('jegy');
});

// Admin oldal (csak admin middleware-rel)
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'admin'])->name('admin');

// Auth (Breeze generálta)
require __DIR__.'/auth.php';
