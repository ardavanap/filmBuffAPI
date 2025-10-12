<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::PUT('register', [AuthController::class, 'register']);
    Route::POST('login', [AuthController::class, 'login']);
    Route::POST('logout', [AuthController::class, 'logout']);
});
