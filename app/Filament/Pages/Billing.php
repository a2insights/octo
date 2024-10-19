<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Billing extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static string $view = 'filament.pages.billing';

    protected ?string $maxContentWidth = 'full';
}
