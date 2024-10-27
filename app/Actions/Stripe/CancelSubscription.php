<?php

namespace App\Actions\Stripe;

use App\Models\Subscription;
use Lorisleiva\Actions\Concerns\AsAction;

// TODO: Test
class CancelSubscription extends StripeBaseAction
{
    use AsAction;

    public function handle(Subscription $subscription, $prorate = true)
    {
        return $this->stripe->subscriptions->cancel($subscription->stripe_id, ['prorate' => $prorate]);
    }
}
