<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\DetailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Anime Routes
Route::prefix('anime')->group(function () {
    Route::get('/search', [AnimeController::class, 'search']);
    Route::get('/genre/{genre}', [AnimeController::class, 'genre']);
    Route::get('/{id}', [AnimeController::class, 'show']);
});

// Movie Routes
Route::prefix('movie')->group(function () {
    Route::get('/search', [MovieController::class, 'search']);
    Route::get('/genre/{genreId}', [MovieController::class, 'genre']);
    Route::get('/{id}', [MovieController::class, 'show']);
});

// Detail Routes
Route::prefix('detail')->group(function () {
    Route::get('/movie/{id}', [DetailController::class, 'movie']);
    Route::get('/anime/{id}', [DetailController::class, 'anime']);
});

// Review Routes
Route::prefix('reviews')->group(function () {
    Route::get('/{itemId}', [ReviewController::class, 'index']);
    Route::post('/', [ReviewController::class, 'store']);
    Route::put('/{reviewId}', [ReviewController::class, 'update']);
    Route::delete('/{reviewId}', [ReviewController::class, 'destroy']);
    Route::get('/{itemId}/average', [ReviewController::class, 'average']);
});

// Watchlist Routes
Route::prefix('watchlist')->group(function () {
    Route::get('/{userId}', [WatchlistController::class, 'index']);
    Route::post('/', [WatchlistController::class, 'store']);
    Route::put('/status', [WatchlistController::class, 'updateStatus']);
    Route::delete('/', [WatchlistController::class, 'destroy']);
});
