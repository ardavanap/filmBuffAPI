<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
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