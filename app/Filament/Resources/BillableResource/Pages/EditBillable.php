<?php

namespace App\Filament\Resources\BillableResource\Pages;

use App\Filament\Resources\BillableResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditBillable extends EditRecord
{
    protected static string $resource = BillableResource::class;

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
