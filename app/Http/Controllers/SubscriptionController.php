<?php

namespace App\Http\Controllers;

use A21ns1g4ts\Billing\Billing;
use A21ns1g4ts\Billing\Contracts\HandleSubscriptionsContract;
use A21ns1g4ts\Billing\Saas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubscriptionController extends Controller
{
    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $request->merge([
            'subscription' => $request->subscription ?: 'main',
        ]);
    }

    /**
     * Redirect the user to subscribe to the plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectWithSubscribeIntent(HandleSubscriptionsContract $manager, Request $request, string $planId)
    {
        $billable = Billing::getBillable($request);

        $plan = Saas::getPlan($planId);

        $subscription = $billable->newSubscription($request->subscription, $plan->getId());

        $checkout = $manager->checkoutOnSubscription(
            $subscription,
            $billable,
            $plan,
            $request
        );

        return view('laravel-saas-billing::checkout', [
            'checkout' => $checkout,
            'stripeKey' => config('cashier.key'),
        ]);
    }

    /**
     * Get the current billable subscription.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @return \Laravel\Cashier\Subscription|null
     */
    protected function getCurrentSubscription($billable, string $subscription)
    {
        return $billable->subscription($subscription);
    }
}
