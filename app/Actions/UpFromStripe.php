<?php

namespace App\Actions;

use App\Actions\Stripe\GetCustomer;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;

class UpFromStripe
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

        $data = GetCustomer::run($stripeId);
        $model->fill($data->toArray());
        $model->save();

        return $model;
    }
}
