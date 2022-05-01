<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::withoutMiddleware(['auth', 'api'])
    ->group(function () {
        Route::apiResource('articles', ArticleController::class)
            ->only(['index', 'show']);
    });

Route::middleware('auth:api')
    ->group(function () {
        Route::get('user', [AuthController::class, 'user']);
        Route::get('logout', [AuthController::class, 'logout']);
        Route::apiResource('articles', ArticleController::class)->except(['index', 'show']);
        Route::apiResource('categories', CategoryController::class)->middleware('admin');
    });
