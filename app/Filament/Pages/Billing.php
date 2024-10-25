<?php

namespace App\Filament\Pages;

use App\Actions\Stripe\Checkout;
use App\BRL;
use App\Models\Price;
use ArchTech\Money\Money;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Infolist;
use Filament\Pages\Page;
use Filament\Resources\Components\Tab;
use Filament\Resources\Concerns\HasTabs;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;

class Billing extends Page
{
    use HasTabs;
    use InteractsWithInfolists;
    use InteractsWithForms;

    protected static string $view = 'filament.pages.billing';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public function getTitle(): string|Htmlable
    {
        return '';
    }

    public function infolist(Infolist $infolist): Infolist
    {
        $plans = Price::where('type', 'recurring')->where('recurring->meter', null)->get();

        return $infolist
            ->state(['plans' => $plans])
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Plans')
                            ->schema([
                                RepeatableEntry::make('plans')
                                    ->label('')
                                    ->schema([
                                        TextEntry::make('productt.name')
                                            ->hiddenLabel()
                                            ->size(TextEntry\TextEntrySize::Large)
                                            ->weight(FontWeight::Bold)
                                            ->color('primary'),
                                        TextEntry::make('unit_amount')
                                            ->hiddenLabel()
                                            ->size(TextEntry\TextEntrySize::Medium)
                                            ->weight(FontWeight::SemiBold)
                                            ->formatStateUsing(fn ($state) => Money::fromDecimal($state, new BRL())),
                                        RepeatableEntry::make('productt.features')
                                            ->label('Features')
                                            ->schema([
                                                TextEntry::make('pivot.value')
                                                    ->default('∞')
                                                    ->formatStateUsing(fn ($state) => !(bool) $state ? '∞' : $state)
                                                    ->hiddenLabel()
                                                    ->columnSpan(1),
                                                TextEntry::make('name')
                                                    ->hiddenLabel()
                                                    ->columnSpan(8),
                                                TextEntry::make('pivot.unit_amount')
                                                    ->formatStateUsing(fn ($state) => Money::fromDecimal($state / 1000, new BRL()).' / unit')
                                                    ->hiddenLabel()
                                                    ->columnSpan(6),
                                            ])->columns(15),
                                        Actions::make([
                                            Action::make('subscribe')
                                                ->icon('heroicon-m-check')
                                               ->label(fn ($record) => auth()->user()->billable->subscribed($record->stripe_id) ? 'Subscribed' : 'Subscribe')
                                               ->disabled(fn ($record) => auth()->user()->billable->subscribed($record->stripe_id))
                                               ->action(fn ($record) => Checkout::run(auth()->user(), $record)),
                                        ])
                                            ->alignment(Alignment::Center)
                                            ->fullWidth(),
                                    ])
                                    ->grid(3),
                            ]),
                        // Tabs\Tab::make('Cartoes')
                        //     ->schema([
                        //         // ...
                        //     ]),
                        // Tabs\Tab::make('Faturas')
                        //     ->schema([
                        //         // ...
                        //     ]),
                    ])
                    ->activeTab(1),
            ]);
    }

    public function getTabs(): array
    {
        return [
            'mounth' => Tab::make(),
            'yearly' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('active', true)),
        ];
    }
}
