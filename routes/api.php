<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FavoriteController;
use Illuminate\Http\Request;

Route::prefix('auth')->group(function () {
    Route::POST('/register', [AuthController::class, 'register']);
    Route::POST('/login', [AuthController::class, 'login']);
    Route::POST('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::apiResource('movie', MovieController::class)->middleware('auth:sanctum');

// _____________________________________** COMMENT routes **________________________________ //
Route::prefix('movie/{id}/')->middleware("auth:sanctum")->group(function () {
    Route::GET('comment', [CommentController::class, 'show']);
    Route::POST('comment', [CommentController::class, 'store']);
});

// _____________________________________** RATING routes **________________________________ //
Route::prefix('movie/{id}/')->middleware('auth:sanctum')->group(function () {
    Route::GET('/rating', [RatingController::class, 'show']);
    Route::POST('/rate', [RatingController::class, 'store']);
});

// _____________________________________** FAVORITE route **________________________________ //
Route::middleware('auth:sanctum')->group(function () {
    Route::POST("/movie/{id}/favorite", [FavoriteController::class, "store"]);
    Route::GET("/user/favorites", [FavoriteController::class, "show"]);
});