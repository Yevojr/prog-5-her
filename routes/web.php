<?php

use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'IsAdmin'])->group(function () {
    Route::resource('admin_settings', AdminSettingsController::class);
});


//games routes
Route::get('/games/overview', [GamesController::class, 'index'])->name('games.index');
Route::get('/games/create/{userId}', [GamesController::class, 'create'])->name('games.create')->middleware('auth');
Route::post('/games', [GamesController::Class, 'store'])->name('games.store')->middleware('auth');
Route::get('/games/search', [GamesController::class, 'search'])->name('games.search')->middleware('auth');
Route::get('/games/details/{game}', [GamesController::class, 'show'])->name('games.show');
Route::get('/games/{game}/edit', [GamesController::class, 'edit'])->name('games.edit')->middleware('auth');
Route::put('/games/{game}', [GamesController::class, 'update'])->name('games.update')->middleware('auth');
Route::delete('/games/{game}', [GamesController::class, 'destroy'])->name('games.destroy')->middleware('isAdmin');


//categories and series routes
Route::get('/categories/overview', [CategoriesController::class, 'index'])->name('categories.index')->middleware('auth');
Route::get('/categories/create/{userId}', [CategoriesController::class, 'create'])->name('categories.create')->middleware('auth');
Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store')->middleware('auth');
Route::get('/categories/search', [CategoriesController::class, 'search'])->name('categories.search')->middleware('auth');
Route::get('/categories/details/{category}', [CategoriesController::class, 'show'])->name('categories.show')->middleware('auth');
Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit')->middleware('auth');
Route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update')->middleware('auth');
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy')->middleware('auth');

Route::get('/series/overview', [SeriesController::class, 'index'])->name('series.index')->middleware('auth');
Route::get('/series/create/{userId}', [SeriesController::class, 'create'])->name('series.create')->middleware('auth');
Route::post('/series', [SeriesController::class, 'store'])->name('series.store')->middleware('auth');
Route::get('/series/search', [SeriesController::class, 'search'])->name('series.search')->middleware('auth');
Route::get('/series/details/{series}', [SeriesController::class, 'show'])->name('series.show')->middleware('auth');
Route::get('/series/{series}/edit', [SeriesController::class, 'edit'])->name('series.edit')->middleware('auth');
Route::put('/series/{series}', [SeriesController::class, 'update'])->name('series.update')->middleware('auth');
Route::delete('/series/{series}', [SeriesController::class, 'destroy'])->name('series.destroy')->middleware('auth');

require __DIR__.'/auth.php';
