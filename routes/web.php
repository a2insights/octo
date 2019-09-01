<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/','HomeController@index')->name('home');
Route::get('/dashboard' , 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/posts' , 'PostController@index')->name('post');
Route::get('/{blog_guard_name}', 'BlogController@index')->name('blog');

Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::resource('/post', 'PostController');
    });

});
