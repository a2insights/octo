<?php

namespace App\Actions;

use App\Actions\Stripe\GetCustomer;
use App\Actions\Stripe\GetProduct;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;

class UpFromStripe
{
    use AsAction;

    public function handle(Model $model, ?string $object = null)
    {
        return match ($object) {
            'customer' => $this->updateFromStripe($model, GetCustomer::class),
            'product' => $this->updateFromStripe($model, GetProduct::class),
            default => null,
        };
    }

    /**
     * Updates the model using the corresponding Stripe action.
     *
     * @param Model $model
     * @param string $stripeActionClass
     * @return Model|null
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
