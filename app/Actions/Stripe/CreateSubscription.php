<?php

namespace App\Actions\Stripe;

use App\Models\Billable;
use App\Models\Price;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

// TODO: Test
class CreateSubscription extends StripeBaseAction
{
    use AsAction;

    public function handle(User $user, Billable $billable, Price $price, string $mode = 'subscription', array $data = [])
    {
        $stripeCustomer = $this->stripe->customers->retrieve($billable->stripe_id);
        if (! $stripeCustomer->default_source && ! $stripeCustomer->invoice_settings->default_payment_method) { // @phpstan-ignore-line
            return Checkout::run($user, $price, $mode, $data);
        }

        $meteredPrices = $price->product->features()
            ->wherePivot('price_id', '!=', null)
            ->wherePivot('meteread', true)
            ->get()
            ->pluck('pivot.price.stripe_id')
            ->filter()
            ->toArray();

        $items = [
            [
                'price' => $price->stripe_id,
                'quantity' => 1,
            ],
        ];

        // foreach ($meteredPrices as $meteredPrice) {
        //     $items[] = [
        //         'price' => $meteredPrice,
        //     ];
        // }

        $this->stripe->subscriptions->create([
            'customer' => $billable->stripe_id,
            'items' => $items,
        ]);
    }
}
