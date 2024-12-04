<?php

namespace App\Http\Controllers;

use A2Insights\FilamentSaas\Site\Http\Controllers\SiteController;
use Inertia\Inertia;

class ShopController extends SiteController
{
    public function marketplace()
    {
        return Inertia::render('Marketplace');
    }
}
