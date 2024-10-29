<?php

namespace App\Filament\Pages;

use App\Actions\Stripe\BillingPortal;
use App\Actions\Stripe\CancelSubscription;
use App\Actions\Stripe\CreateSubscription;
use App\Models\Price;
use ArchTech\Money\Money;
use Filament\Actions as FilamentActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;
use Stripe\Subscription as StripeSubscription;

class Plans extends Page
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    protected static string $view = 'filament.pages.plans';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string|Htmlable
    {
        return 'Plans';
    }

    protected function getHeaderActions(): array
    {
        return [
            FilamentActions\Action::make('billingPortal')
                ->label('Billing Portal')
                ->icon('heroicon-o-user-circle')
                ->action(function () {
                    BillingPortal::run(auth()->user()->billable);
                }),

        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        $plans = Price::where('type', 'recurring')->where('recurring->meter', null)->get();

        return $infolist
            ->state(['plans' => $plans])
            ->schema([
                RepeatableEntry::make('plans')
                    ->label('')
                    ->schema([
                        TextEntry::make('product.name')
                            ->hiddenLabel()
                            ->size(TextEntry\TextEntrySize::Large)
                            ->weight(FontWeight::Bold)
                            ->color('primary'),
                        TextEntry::make('unit_amount')
                            ->hiddenLabel()
                            ->size(TextEntry\TextEntrySize::Medium)
                            ->weight(FontWeight::SemiBold)
                            ->formatStateUsing(fn ($state, $record) => Money::fromDecimal($state / 100, Str::upper($record->currency))),
                        RepeatableEntry::make('product.features')
                            ->label('Features')
                            ->schema([
                                TextEntry::make('name')
                                    ->formatStateUsing(fn ($record) => $record->valueing($record->pivot))
                                    ->hiddenLabel()
                                    ->columnSpan(1),
                                TextEntry::make('name')
                                    ->hiddenLabel()
                                    ->columnSpan(2),
                                TextEntry::make('name')
                                    ->formatStateUsing(fn ($record) => $record->pricing($record->pivot))
                                    ->hiddenLabel()
                                    ->columnSpan(3),
                            ])->columns(6),
                        Actions::make([
                            Action::make('subscribe')
                                ->icon('heroicon-m-check')
                                ->label(fn ($record) => auth()->user()->billable->subscribed($record->stripe_id) ? 'Subscribed' : 'Subscribe')
                                ->hidden(fn ($record) => auth()->user()->billable->subscribed($record->stripe_id))
                                ->action(fn ($record, $action) => self::subscribe($record, $action)),
                            Action::make('cancel')
                                ->icon('heroicon-o-x-mark')
                                ->label(fn ($record) => 'Cancel')
                                ->color('danger')
                                ->requiresConfirmation()
                                ->hidden(fn ($record) => ! auth()->user()->billable->subscribed($record->stripe_id))
                                ->action(fn ($record, $action) => self::cancel($record, $action)),
                        ])
                            ->alignment(Alignment::Center)
                            ->fullWidth(),
                    ])
                    ->grid(3),
            ]);
    }

    private static function subscribe($record, $action)
    {
        $billable = auth()->user()->billable;
        $subscription = $billable->subscriptions()
            ->whereStatus(StripeSubscription::STATUS_ACTIVE)
            ->first();
        if ($subscription) {
            Notification::make()
                ->danger()
                ->title('Already Subscribed')
                ->body("You're already subscribed to another plan. Cancel it before you subscribe to another plan.")
                ->send();

            $action->cancel();
        } else {
            CreateSubscription::run(auth()->user(), $billable, $record);
        }

        sleep(2);

        return redirect(Plans::getUrl());
    }

    private static function cancel($record, $action)
    {
        $billable = auth()->user()->billable;

        $subscription = $billable->subscriptions()
            ->where('stripe_id', $record->stripe_price)
            ->whereStatus(StripeSubscription::STATUS_ACTIVE)
            ->first();

        if (! $subscription) {
            $subscription = $billable->subscriptions()
                ->whereStatus(StripeSubscription::STATUS_ACTIVE)
                ->get()
                ->map(fn ($record) => $record->items)
                ->firstWhere('stripe_price', $record->stripe_price)
                ->first()->subscription;
        }

        if ($subscription) {
            $stripeSubscription = CancelSubscription::run($subscription);
            if ($stripeSubscription) {
                Notification::make()
                    ->success()
                    ->title('Subscription Canceled')
                    ->body('Your subscription has been canceled.')
                    ->send();
            }
        } else {
            Notification::make()
                ->danger()
                ->title('Subscription Cant be Canceled')
                ->body('You cannot cancel this subscription.')
                ->persistent()
                ->send();

            $action->cancel();
        }

        sleep(2);

        return redirect(Plans::getUrl());
    }
}
