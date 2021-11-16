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
Route::get('app-dev/table', [\App\Http\Controllers\App\Dev\AppDevTableExampleController::class, 'index'])->name('app-dev.table.index');
Route::get('app-dev/table/{id}', [\App\Http\Controllers\App\Dev\AppDevTableExampleController::class, 'show'])->name('app-dev.table.show');
Route::delete('app-dev/table/{id}', [\App\Http\Controllers\App\Dev\AppDevTableExampleController::class, 'delete'])->name('app-dev.table.destroy');
Route::get('app-dev/table/{id}/show', [\App\Http\Controllers\App\Dev\AppDevTableExampleController::class, 'edit'])->name('app-dev.table.edit');

Route::middleware([
    'auth:sanctum',
])->group(function () {
    // App Dashboard
    Route::get('app/dashboard', [\App\Http\Controllers\App\AppDashboardController::class, 'index'])->name('app.dashboard');
    // Auth
    Route::delete('auth/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('auth/session', [\App\Http\Controllers\AuthController::class, 'session']);
});
