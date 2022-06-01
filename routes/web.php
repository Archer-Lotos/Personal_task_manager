<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/', App\Http\Controllers\TaskController::class)->only('index', 'store');
    Route::resource('/tag', App\Http\Controllers\TagController::class)->only('index', 'store');
});


