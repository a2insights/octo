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

use Filament\Pages\Dashboard;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'brevoNewsletterUrl' => config('services.brevo.newsletter_url'),
        'dashboardUrl' => url(Auth::user()?->personalCompany() ? Dashboard::getUrl(panel: 'company', tenant: Auth::user()?->personalCompany()) : config('octo.tenant_path')),
    ]);
});
