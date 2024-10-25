<?php

namespace App\Filament\Resources;

use App\Actions\Stripe\GetFeatures;
use App\Actions\Stripe\GetPrices;
use App\Filament\Resources\FeatureResource\Pages;
use App\Filament\Resources\FeatureResource\RelationManagers;
use App\Models\Feature;
use App\Models\Price;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeatureResource extends Resource
{
    protected static ?string $model = Feature::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        $features = Feature::pluck('name', 'stripe_id');
        $prices = Price::pluck('nickname', 'stripe_id');

        return $form
            ->schema([
                Forms\Components\Section::make('Stripe Information')
                    ->schema([
                        Forms\Components\Select::make('stripe_id')
                            ->required()
                            ->options(fn(Get $get): array => self::getFeatures())
                            ->disableOptionWhen(fn(string $value): bool => $features->has($value))
                            ->searchable()
                            ->columnSpan(2),
                        Forms\Components\Select::make('stripe_price')
                            ->required()
                            ->options(fn(Get $get): array => self::getPrices())
                            ->disableOptionWhen(fn(string $value): bool => $prices->has($value))
                            ->searchable()
                            ->columnSpan(1),
                    ])->columns(3),

                Forms\Components\Section::make('Price and Product Information')
                    ->schema([
                        Forms\Components\Select::make('price_id')
                            ->relationship('price', 'id')
                            ->required(),
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('value')
                            ->numeric(),
                    ])->columns(3),

                Forms\Components\Section::make('Product Settings')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Group::make([
                            Forms\Components\Toggle::make('resetable')
                                ->required(),
                            Forms\Components\Toggle::make('unlimited')
                                ->required(),
                            Forms\Components\Toggle::make('meteread')
                                ->required(),
                        ]),
                    ])->columns(3),

                Forms\Components\Section::make('Unit and Amount')
                    ->schema([
                        Forms\Components\TextInput::make('unit')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('unit_amount')
                            ->numeric(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stripe_price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('resetable')
                    ->boolean(),
                Tables\Columns\IconColumn::make('unlimited')
                    ->boolean(),
                Tables\Columns\IconColumn::make('meteread')
                    ->boolean(),
                Tables\Columns\TextColumn::make('unit_amount')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListFeatures::route('/'),
            'create' => Pages\CreateFeature::route('/create'),
            'edit' => Pages\EditFeature::route('/{record}/edit'),
        ];
    }

    public static function getFeatures(): array
    {
        return collect(GetFeatures::run(100))
            ->map(fn($price) => [
                'id' => $price->id,
                'text' => "{$price->name} - {$price->id}",
            ])
            ->pluck('text', 'id')
            ->toArray();
    }

    public static function getPrices(): array
    {
        return collect(GetPrices::run(100))
            ->map(fn($price) => [
                'id' => $price->id,
                'text' => "{$price->nickname} - {$price->id}",
            ])
            ->pluck('text', 'id')
            ->toArray();
    }
}
