<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
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
    'middleware' => ['web', 'auth'],
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/' , 'DashboardController@index')->name('dashboard');
        Route::get('posts' , 'PostController@index')->name('post');
        Route::resource('post', 'PostController');
        Route::get('settings' , 'SettingsController@edit')->name('settings');
        Route::put('settings' , 'SettingsController@update')->name('settings.update');
        Route::get('profile' , 'ProfileController@edit')->name('profile');
        Route::put('profile' , 'ProfileController@update')->name('profile.update');
        Route::post('account' , 'ProfileController@deleteAccount')->name('account.delete');
        Route::put('password' , 'ProfileController@updatePassword')->name('profile.password');
    });
});
