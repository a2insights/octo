<?php

namespace App\Filament\Resources\BillableResource\Pages;

use App\Filament\Resources\BillableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBillable extends EditRecord
{
    protected static string $resource = BillableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
