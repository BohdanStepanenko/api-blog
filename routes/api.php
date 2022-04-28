<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

Route::group([

    'middleware' => 'admin',
    'prefix' => 'categories'

], function () {
    Route::get('/', [CategoryController::class, 'index'])->withoutMiddleware(['admin']);
    Route::get('create', [CategoryController::class, 'create']);
    Route::get('{id}', [CategoryController::class, 'show'])->withoutMiddleware(['admin']);
    Route::get('{id}/edit', [CategoryController::class, 'edit']);
    Route::delete('{id}', [CategoryController::class, 'destroy']);
});

Route::group([

    'middleware' => 'admin',
    'prefix' => 'articles'

], function () {
    Route::get('/', [ArticleController::class, 'index'])->withoutMiddleware(['admin']);
    Route::get('create', [ArticleController::class, 'create']);
    Route::get('{id}', [ArticleController::class, 'show'])->withoutMiddleware(['admin']);
    Route::get('{id}/edit', [ArticleController::class, 'edit']);
    Route::delete('{id}', [ArticleController::class, 'destroy']);
});
