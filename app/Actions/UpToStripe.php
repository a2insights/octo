<?php

namespace App\Actions;

use App\Actions\Stripe\UpdateCustomer;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;

class UpToStripe
{
    use AsAction;

    public function handle(Model $model, ?string $object = null)
    {
        return match ($object) {
            'customer' => $this->handleCustomer($model, $object),
            default => null,
        };
    }

    protected function handleCustomer(Model $model, ?string $object = null)
    {
        $stripeId = $model->stripe_id; // @phpstan-ignore-line
        if (is_null($stripeId)) {
            return null;
        }

        $data = UpdateCustomer::run($stripeId, $model->toArray());
        $model->fill($data->toArray());
        $model->save();

        return $model;
    }
}
