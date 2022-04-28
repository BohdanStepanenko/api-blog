<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('articles', App\Http\Controllers\ArticleController::class);
    Route::apiResource('categories', App\Http\Controllers\CategoryController::class);

    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);

    Route::get('test', function() {
        return 'test';
    });
});
