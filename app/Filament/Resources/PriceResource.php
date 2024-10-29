<?php

namespace App\Filament\Resources;

use App\Actions\Stripe\GetPrices;
use App\Filament\Resources\PriceResource\Pages;
use App\Models\Price;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Novadaemon\FilamentPrettyJson\PrettyJson;

class PriceResource extends Resource
{
    protected static ?string $model = Price::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Stripe';

    public static function form(Form $form): Form
    {
        $prices = Price::pluck('nickname', 'stripe_id');

        return $form->schema([
            Forms\Components\Section::make('General Information')
                ->schema([
                    Forms\Components\Select::make('stripe_id')
                        ->required()
                        ->options(fn (Get $get): array => self::getPrices())
                        ->disableOptionWhen(fn (string $value): bool => $prices->has($value))
                        ->searchable()
                        ->columnSpan(3),
                    Forms\Components\Select::make('product_id')
                        ->relationship('product', 'name')
                        ->required(),
                    Forms\Components\TextInput::make('nickname')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('lookup_key')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('active')
                        ->disabled() ,
                ])->columns(6),

            Forms\Components\Section::make('Details')
                ->schema([
                    Forms\Components\TextInput::make('stripe_id')
                        ->maxLength(255)
                        ->readonly(),
                    Forms\Components\TextInput::make('stripe_product')
                        ->maxLength(255)
                        ->readonly(),
                    Forms\Components\TextInput::make('currency')
                        ->maxLength(255)
                        ->readonly(),
                    PrettyJson::make('recurring')
                        ->disabled(),
                    PrettyJson::make('metadata')
                        ->disabled(),
                    Forms\Components\TextInput::make('type')
                        ->readonly(),
                    Forms\Components\TextInput::make('unit_amount')
                        ->numeric()
                        ->readonly(),
                    Forms\Components\TextInput::make('unit_label')
                        ->readonly(),
                ])->columns(3),

            Forms\Components\Section::make('Advanced Settings')
                ->schema([
                    Forms\Components\TextInput::make('billing_scheme')
                        ->readonly(),
                    Forms\Components\DateTimePicker::make('created')
                        ->readonly(),
                    PrettyJson::make('currency_options')
                        ->disabled(),
                    PrettyJson::make('custom_unit_amount')
                        ->disabled(),
                    Forms\Components\Toggle::make('livemode')
                        ->disabled(),
                    Forms\Components\Toggle::make('transfer_lookup_key')
                        ->disabled(),
                    Forms\Components\TextInput::make('tax_behavior')
                        ->maxLength(255)
                        ->readonly(),
                    Forms\Components\TextInput::make('tiers_mode')
                        ->maxLength(255)
                        ->readonly(),
                    PrettyJson::make('transform_quantity')
                        ->disabled(),
                    Forms\Components\TextInput::make('unit_amount_decimal')
                        ->maxLength(255)
                        ->readonly(),
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stripe_id')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('currency'),
                Tables\Columns\TextColumn::make('nickname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('unit_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('billing_scheme'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrices::route('/'),
            'create' => Pages\CreatePrice::route('/create'),
            'edit' => Pages\EditPrice::route('/{record}/edit'),
        ];
    }

    public static function getPrices(): array
    {
        return collect(GetPrices::run(100))
            ->map(fn ($price) => [
                'id' => $price->id,
                'text' => "{$price->nickname} - {$price->id}",
            ])
            ->pluck('text', 'id')
            ->toArray();
    }
}
