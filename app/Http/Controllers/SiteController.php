<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\JsonLd;
use Filament\Pages\Dashboard;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
// OR with multi

// OR
use Inertia\Inertia;
use Octo\Settings\Settings;

class SiteController extends Controller
{
    public function index(Settings $settings)
    {
        SEOTools::setTitle($settings->name, false);
        SEOTools::setDescription($settings->description);
        JsonLd::addImage('http://localhost/storage/images/logo.svg');
        OpenGraph::setUrl(url('/'));
        OpenGraph::addProperty('type', 'SaaS');
        OpenGraph::addProperty('keywords', collect($settings->keywords)->implode(', '));
        OpenGraph::addImage(url('/img/og.png'));

        return Inertia::render('Home', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'brevoNewsletterUrl' => config('services.brevo.newsletter_url'),
            'dashboardUrl' => url(Auth::user()?->personalCompany()
                ? Dashboard::getUrl(panel: 'company', tenant: Auth::user()->personalCompany())
                : config('octo.tenant_path')),
        ]);
    }
}
