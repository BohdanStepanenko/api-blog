<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::apiResource('categories', CategoryController::class)->middleware('admin');
Route::apiResource('articles', ArticleController::class)->middleware('auth:api', ['except' => ['index', 'show']]);
