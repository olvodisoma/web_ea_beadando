<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Csak bejelentkezett felhasználóknak (regisztrált látogató)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Üzenetek menüpont (csak bejelentkezett felhasználók)
    Route::get('/uzenetek', function () {
        return view('uzenetek');
    })->name('uzenetek');
});

/*
|--------------------------------------------------------------------------
| Csak admin felhasználóknak
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'admin'])->name('admin');

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze által generált)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

