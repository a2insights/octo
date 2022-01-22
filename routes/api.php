<?php

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

// Public Routes
Route::post('auth/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('ziggy', [\App\Http\Controllers\ZiggyController::class, 'index']);

// Demo app
Route::middleware([
    'auth:sanctum',
])->group(function () {
    // Auth
    Route::delete('auth/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('auth/session', [\App\Http\Controllers\AuthController::class, 'session']);
});
