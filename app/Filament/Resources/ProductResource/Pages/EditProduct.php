<?php

namespace App\Filament\Resources\ProductResource\Pages;

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
                ->label('Update From Stripe')
                ->action(function () {
                    $this->record->updateFromStripe();

                    return redirect($this->getUrl(['record' => $this->record->id]));
                })
                ->outlined(),
            Actions\Action::make('updateToStripe')
                ->label('Update To Stripe')
                ->action(function () {
                    $this->record->updateToStripe();

                    return redirect($this->getUrl(['record' => $this->record->id]));
                })
                ->outlined(),
        ];
    }
}
