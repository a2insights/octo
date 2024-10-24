<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Actions\UpFromStripe;
use App\Actions\UpToStripe;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('updateFromStripe')
                ->label('Up From Stripe')
                ->action(function () {
                    UpFromStripe::run($this->record, 'product');

                    return redirect($this->getUrl(['record' => $this->record->id])); // @phpstan-ignore-line
                }),
            Actions\Action::make('updateToStripe')
                ->label('Up To Stripe')
                ->action(function () {
                    UpToStripe::run($this->record, 'product');

                    return redirect($this->getUrl(['record' => $this->record->id])); // @phpstan-ignore-line
                }),
        ];
    }
}
