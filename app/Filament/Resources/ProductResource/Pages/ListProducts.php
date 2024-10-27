<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'plans' => Tab::make()->query(fn ($query) => $query->where('type', 'plan')),
            'features' => Tab::make()->query(fn ($query) => $query->where('type', 'feature')),
            'skus' => Tab::make()->query(fn ($query) => $query->where('type', 'sku')),
            'services' => Tab::make()->query(fn ($query) => $query->where('type', 'service')),
        ];
    }
}
