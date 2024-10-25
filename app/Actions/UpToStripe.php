<?php

namespace App\Actions;

use App\Actions\Stripe\UpdateCustomer;
use App\Actions\Stripe\UpdateFeature;
use App\Actions\Stripe\UpdatePrice;
use App\Actions\Stripe\UpdateProduct;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;

class UpToStripe
{
    use AsAction;

    public function handle(Model $model, ?string $object = null)
    {
        $action = match ($object) {
            'customer' => UpdateCustomer::class,
            'product' => UpdateProduct::class,
            'price' => UpdatePrice::class,
            'feature' => UpdateFeature::class,
            default => null,
        };

        return $action ? $this->updateToStripe($model, $action) : null;
    }

    /**
     * Updates data in Stripe using the corresponding action class.
     *
     * @param Model $model
     * @param string $stripeActionClass
     * @return Model|null
     */
    protected function updateToStripe(Model $model, string $stripeActionClass): ?Model
    {
        $stripeId = $model->stripe_id; // @phpstan-ignore-line
        if (is_null($stripeId)) {
            return null;
        }

        // Run the action to update data in Stripe and update the local model
        $data = $stripeActionClass::run($stripeId, $model->toArray());
        $model->fill($data->toArray());
        $model->save();

        return $model;
    }
}
