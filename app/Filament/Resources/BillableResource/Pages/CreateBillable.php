<?php

namespace App\Filament\Resources\BillableResource\Pages;

use App\Filament\Resources\BillableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBillable extends CreateRecord
{
    protected static string $resource = BillableResource::class;
}
