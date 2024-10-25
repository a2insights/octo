<?php

namespace App\Actions;

use App\Actions\Stripe\GetCustomer;
use App\Actions\Stripe\GetFeature;
use App\Actions\Stripe\GetPrice;
use App\Actions\Stripe\GetProduct;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;

class UpFromStripe
{
    use AsAction;

    public function handle(Model $model, ?string $object = null)
    {
        $action = match ($object) {
            'customer' => GetCustomer::class,
            'product' => GetProduct::class,
            'price' => GetPrice::class,
            'feature' => GetFeature::class,
            default => null,
        };

        return $action ? $this->updateFromStripe($model, $action) : null;
    }

    /**
     * Updates the model using the corresponding Stripe action.
     */
    protected function updateFromStripe(Model $model, string $stripeActionClass): ?Model
    {
        $stripeId = $model->stripe_id; // @phpstan-ignore-line
        if (is_null($stripeId)) {
            return null;
        }

        // Run the action to get data from Stripe and update the model
        $data = $stripeActionClass::run($stripeId);
        $model->fill($data->toArray());
        $model->save();

        return $model;
    }
}
