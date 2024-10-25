<?php

namespace App\Actions;

use App\Models\Billable;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateBillable
{
    use AsAction;

    public function handle(Billable $billable, array $data)
    {
        $billable->update($data);

        return $billable;
    }
}
