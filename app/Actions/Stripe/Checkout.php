<?php

namespace App\Actions\Stripe;

use App\Actions\GetOrCreateBillable;
use App\Filament\Pages\Plans;
use App\Models\Price;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Lorisleiva\Actions\Concerns\AsAction;

// TODO: Test
class Checkout extends StripeBaseAction
{
    use AsAction;

    /**
     * Handle the checkout session creation.
     */
    public function handle(User $user, Price $price, string $mode = 'setup', array $data = [])
    {
        $meteredPrices = $price->productt->features()
            ->whereNotNull('stripe_price')
            ->wherePivot('meteread', true)
            ->pluck('stripe_price')
            ->toArray();

        $lineItems = [
            [
                'price' => $price->stripe_id,
                'quantity' => 1,
            ],
        ];

        foreach ($meteredPrices as $meteredPrice) {
            $lineItems[] = [
                'price' => $meteredPrice,
            ];
        }

        $billable = GetOrCreateBillable::run($user, $user->email, $user->name, $data);

        $data = array_merge($data, [
            'customer' => $billable->stripe_id,
            'line_items' => $lineItems,
            'mode' => $mode,
            'ui_mode' => 'hosted',
            'success_url' => Plans::getUrl(),
            'cancel_url' => Plans::getUrl(),
        ]);

        $checkoutSession = $this->stripe->checkout->sessions->create($data);

        return Redirect::to($checkoutSession->url, 303);
    }
}
