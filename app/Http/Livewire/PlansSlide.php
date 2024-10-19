<?php

namespace App\Http\Livewire;

use A21ns1g4ts\Billing\Billing;
use A21ns1g4ts\Billing\Contracts\HandleSubscriptionsContract;
use A21ns1g4ts\Billing\Saas;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Illuminate\Http\Request;
use Livewire\Component;

class PlansSlide extends Component implements HasForms, HasInfolists
{
    use InteractsWithActions;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public function plansInfolist(Infolist $infolist): Infolist
    {
        $plans = Saas::getPlans()->map(fn ($p) => $p->toArray())->values()->all();

        return $infolist
            ->state(['plans' => $plans])
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Planos')
                            ->schema([
                                RepeatableEntry::make('plans')
                                    ->label('')
                                    ->schema([
                                        TextEntry::make('name')
                                            ->hiddenLabel()
                                            ->size(TextEntry\TextEntrySize::Large)
                                            ->weight(FontWeight::Bold)
                                            ->color('primary'),
                                        TextEntry::make('price')
                                            ->hiddenLabel()
                                            ->size(TextEntry\TextEntrySize::Medium)
                                            ->weight(FontWeight::Light)
                                            ->formatStateUsing(fn ($state) => 'R$ '.$state),
                                        RepeatableEntry::make('features')
                                            ->schema([
                                                TextEntry::make('value')->hiddenLabel()
                                                    ->columnSpan(1),
                                                TextEntry::make('name')->hiddenLabel()
                                                    ->columnSpan(11),
                                            ])->columns(12),
                                        // TextEntry::make('id')
                                        //     ->hiddenLabel()
                                        //     ->size(TextEntry\TextEntrySize::Large)
                                        //     ->color('primary')
                                        //     ->formatStateUsing(fn ($state) => 'Assinar')
                                        //     ->weight(FontWeight::Bold)
                                        //     ->suffixAction(
                                        //         fn ($state) => Action::make('subscribe')
                                        //             ->icon('heroicon-m-check')
                                        //             ->label('Assinar')
                                        //             ->action(function () use ($state) {
                                        //                 $this->subscribeToPlan($state);
                                        //             })
                                        //     ),
                                        Actions::make([
                                            Action::make('subscribe')
                                                ->icon('heroicon-m-check')
                                               // ->requiresConfirmation()
                                                ->action(function () {}),
                                            // Action::make('resetStars')
                                            //     ->icon('heroicon-m-x-mark')
                                            //     ->color('danger')
                                            //     ->requiresConfirmation()
                                            //     ->action(function ($resetStars) {
                                            //         $resetStars();
                                            //     }),
                                        ])
                                            ->alignment(Alignment::Center)
                                            ->fullWidth(),
                                    ])
                                    ->grid(4),

                            ]),
                        Tabs\Tab::make('Cartoes')
                            ->schema([
                                // ...
                            ]),
                        Tabs\Tab::make('Faturas')
                            ->schema([
                                // ...
                            ]),
                    ])
                    ->activeTab(1),
            ]);

    }

    /**
     * Render the compoenent.
     *
     * @return void
     */
    public function render(Request $request)
    {
        $billable = Billing::getBillable($request);

        $subscription = $this->getCurrentSubscription($billable, $request?->subscription);

        return view('components.plans-slide', [
            'currentPlan' => $subscription ? $subscription->getPlan() : null,
            'hasDefaultPaymentMethod' => $billable->hasDefaultPaymentMethod(),
            'paymentMethods' => $billable->paymentMethods(),
            'plans' => Saas::getPlans(),
            'recurring' => $subscription ? $subscription->recurring() : false,
            'cancelled' => $subscription ? $subscription->cancelled() : false,
            'onGracePeriod' => $subscription ? $subscription->onGracePeriod() : false,
            'endingDate' => $subscription ? optional($subscription->ends_at)->format('d M Y \a\t H:i') : null,
        ]);
    }

    /**
     * Redirect the user to subscribe to the plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribeToPlan(string $planId)
    {
        return redirect()->route('laravel-saas-billing.subscription.plan-subscribe', ['plan' => $planId]);
    }

    /**
     * Swap the plan to a new one.
     *
     * @param  \A21ns1g4ts\BillingPortal\Contracts\HandleSubscriptionsContract  $manager
     * @return \Illuminate\Http\Response|void
     */
    public function swapPlan(HandleSubscriptionsContract $manager, Request $request, string $newPlanId)
    {
        $newPlan = Saas::getPlan($newPlanId);
        $billable = Billing::getBillable($request);

        if (! $subscription = $this->getCurrentSubscription($billable, $request->subscription)) {
            $this->dangerBanner("The subscription {$request->subscription} does not exist.");

            return false;
        }

        // If the desired plan has a price and the user has no payment method added to its account,
        // redirect it to the Checkout page to finish the payment info & subscribe.
        if ($newPlan->getPrice() > 0.00 && ! $billable->defaultPaymentMethod()) {
            return redirect()->route('billing-portal.subscription.plan-subscribe', ['plan' => $newPlan->getId()]);
        }

        // Otherwise, check if it is not already subscribed to the new plan and initiate
        // a plan swapping. It also takes proration into account.
        if (! $billable->subscribed($subscription->name, $newPlan->getId())) {
            $hasValidSubscription = $subscription && $subscription->valid();

            $subscription = value(function () use ($hasValidSubscription, $subscription, $newPlan, $request, $billable, $manager) {
                if ($hasValidSubscription) {
                    return $manager->swapToPlan($subscription, $billable, $newPlan, $request);
                }

                // However, this is the only place where a ->create() method is involved. At this point, the user has
                // a default payment method set and we will initialize the subscription in case it is not subscribed
                // to a plan with the given subscription name.
                return $manager->subscribeToPlan(
                    $billable,
                    $newPlan,
                    $request
                );
            });
        }

        $this->banner("The plan got successfully changed to {$newPlan->getName()}!");
    }

    /**
     * Cancel the current active subscription.
     *
     * @param  \A21ns1g4ts\BillingPortal\Contracts\HandleSubscriptionsContract  $manager
     * @return void
     */
    public function cancelSubscription(HandleSubscriptionsContract $manager, Request $request)
    {
        $billable = Billing::getBillable($request);

        if (! $subscription = $this->getCurrentSubscription($billable, $request->subscription)) {
            $this->dangerBanner("The subscription {$request->subscription} does not exist.");

            return false;
        }

        $manager->cancelSubscription($subscription, $billable, $request);

        $this->banner('The current subscription got cancelled!');
    }

    /**
     * Resume the current cancelled subscription.
     *
     * @param  \A21ns1g4ts\BillingPortal\Contracts\HandleSubscriptionsContract  $manager
     * @return \Illuminate\Http\Response|void
     */
    public function resumeSubscription(HandleSubscriptionsContract $manager, Request $request)
    {
        $billable = Billing::getBillable($request);

        if (! $subscription = $this->getCurrentSubscription($billable, $request->subscription)) {
            $this->dangerBanner("The subscription {$request->subscription} does not exist.");

            return false;
        }

        $manager->resumeSubscription($subscription, $billable, $request);

        $this->banner('The subscription has been resumed.');
    }

    /**
     * Get the current billable subscription.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @return \Laravel\Cashier\Subscription|null
     */
    protected function getCurrentSubscription($billable, ?string $subscription)
    {
        return $billable->subscription($subscription);
    }
}
