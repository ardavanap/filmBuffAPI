<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\CommentController;
use App\Http\Controllers\V1\MovieController;
use App\Http\Controllers\V1\RatingController;
use App\Http\Controllers\V1\FavoriteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::prefix('v1/auth')->group(function () {
    Route::POST('/register', [AuthController::class, 'register']);
    Route::POST('/login', [AuthController::class, 'login']);
    Route::POST('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::apiResource('v1/movie', MovieController::class)->middleware('auth:sanctum');

// _____________________________________** COMMENT routes **________________________________ //
Route::prefix('v1/movie/{id}/')->middleware("auth:sanctum")->group(function () {
    Route::GET('comment', [CommentController::class, 'show']);
    Route::POST('comment', [CommentController::class, 'store']);
});

// _____________________________________** RATING routes **________________________________ //
Route::prefix('v1/movie/{id}/')->middleware('auth:sanctum')->group(function () {
    Route::GET('/rating', [RatingController::class, 'show']);
    Route::POST('/rate', [RatingController::class, 'store']);
});

// _____________________________________** FAVORITE route **________________________________ //
Route::middleware('auth:sanctum')->group(function () {
    Route::POST("/v1/movie/{id}/favorite", [FavoriteController::class, "store"]);
    Route::GET("/v1/user/favorites", [FavoriteController::class, "show"]);
});