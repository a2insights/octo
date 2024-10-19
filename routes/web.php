<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'laravel-saas-billing',
    'as' => 'laravel-saas-billing.',
    'middleware' => 'web',
], function () {
    Route::get('/subscription/subscribe/{plan}', [SubscriptionController::class, 'redirectWithSubscribeIntent'])->name('subscription.plan-subscribe');
});
