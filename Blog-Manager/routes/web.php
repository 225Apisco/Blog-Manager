<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdPhotoController;
use App\Models\Ad;
use App\Http\Controllers\CommentController;

Route::get('/', [AdController::class, 'home'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Routes pour users connecté
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
    Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
    Route::put('/ads/{ad}', [AdController::class, 'update'])->name('ads.update');
    Route::delete('/ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');

    // Routes de les photos
    Route::post('/ads/{ad}/photos', [AdPhotoController::class, 'store'])->name('ads.photos.store');
    Route::delete('/ads/photos/{photo}', [AdPhotoController::class, 'destroy'])->name('ads.photos.destroy');

});

Route::post('/ads/{ad}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');

require __DIR__.'/auth.php';
