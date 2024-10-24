<?php

namespace App\Filament\Resources\PriceResource\Pages;

use App\Actions\UpFromStripe;
use App\Actions\UpToStripe;
use App\Filament\Resources\PriceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrice extends EditRecord
{
    protected static string $resource = PriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('updateFromStripe')
                ->label('Up From Stripe')
                ->action(function () {
                    UpFromStripe::run($this->record, 'price');

                    return redirect($this->getUrl(['record' => $this->record->id])); // @phpstan-ignore-line
                }),
            Actions\Action::make('updateToStripe')
                ->label('Up To Stripe')
                ->action(function () {
                    UpToStripe::run($this->record, 'price');

                    return redirect($this->getUrl(['record' => $this->record->id])); // @phpstan-ignore-line
                }),
        ];
    }
}
