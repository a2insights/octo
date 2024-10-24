<?php

namespace App\Filament\Resources;

use App\Actions\Stripe\GetProducts;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Novadaemon\FilamentPrettyJson\PrettyJson;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        $products = Product::pluck('name', 'stripe_id');

        return $form
            ->schema([
                Forms\Components\Select::make('stripe_id')
                    ->required()
                    ->options(fn (Get $get): array => self::getProducts())
                    ->disableOptionWhen(fn (string $value): bool => $products->has($value))
                    ->searchable()
                    ->columnSpan(3),
                Forms\Components\TextInput::make('stripe_id')
                    ->maxLength(255)
                    ->readOnly(),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')
                    ->disabled(),
                Forms\Components\Toggle::make('livemode')
                    ->disabled(),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                PrettyJson::make('metadata')->disabled(),
                PrettyJson::make('default_price_data')->disabled(),
                PrettyJson::make('images')->disabled(),
                PrettyJson::make('marketing_features')->disabled(),
                PrettyJson::make('package_dimensions')->disabled(),
                Forms\Components\Toggle::make('shippable')
                    ->disabled(),
                Forms\Components\TextInput::make('tax_code')
                    ->maxLength(255)
                    ->readOnly(),
                Forms\Components\TextInput::make('unit_label')
                    ->maxLength(255)
                    ->readOnly(),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255)
                    ->readOnly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stripe_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('livemode')
                    ->boolean(),
                Tables\Columns\IconColumn::make('shippable')
                    ->boolean(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getProducts(): array
    {
        return collect(GetProducts::run(100))
            ->map(fn ($product) => [
                'id' => $product->id,
                'text' => "{$product->name} - {$product->id}",
            ])
            ->pluck('text', 'id')
            ->toArray();
    }
}
