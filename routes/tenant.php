<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::group([
    'prefix' => '/{tenant}',
    'middleware' => ['web', 'auth', InitializeTenancyByPath::class],
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/' , 'DashboardController@index')->name('dashboard');
        Route::get('posts' , 'PostController@index')->name('post');
        Route::resource('post', 'PostController');
    });
});
