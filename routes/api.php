<?php

use App\Http\Controllers\Api\{
    TagController,
    TaskController,
    AuthController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['anonymous.api'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth.api'])->group(function () {
    Route::get('/task', [TaskController::class, 'index']);
    Route::get('/task/{id}', [TaskController::class, 'show']);
    Route::post('/task', [TaskController::class, 'store']);
    Route::get('/tag', [TagController::class, 'index']);
    Route::get('/tag/{id}', [TagController::class, 'show']);
    Route::post('/tag', [TagController::class, 'store']);
});
