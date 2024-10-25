<?php

namespace App\Filament\Resources;

use App\Actions\Stripe\GetProducts;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\PricesRelationManager;
use App\Models\Feature;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Repeater;
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
                Forms\Components\Section::make('Stripe Information')
                    ->schema([
                        Forms\Components\Select::make('stripe_id')
                            ->label('Stripe Product')
                            ->required()
                            ->options(fn(Get $get): array => self::getProducts())
                            ->disableOptionWhen(fn(string $value): bool => $products->has($value))
                            ->searchable()
                            ->columnSpan(3),
                        Forms\Components\TextInput::make('stripe_id')
                            ->label('Stripe ID')
                            ->maxLength(255)
                            ->readOnly(),
                        Forms\Components\TextInput::make('name')
                            ->label('Product Name')
                            ->maxLength(255)
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Product Attributes')
                    ->schema([
                        Forms\Components\TextInput::make('description')
                            ->label('Description')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Group::make([
                            Forms\Components\Toggle::make('active')
                                ->label('Active')
                                ->disabled(),
                            Forms\Components\Toggle::make('livemode')
                                ->label('Live Mode')
                                ->disabled(),
                            Forms\Components\Toggle::make('shippable')
                                ->label('Shippable')
                                ->disabled(),
                        ]),
                    ])->columns(3),

                Forms\Components\Section::make('Additional Information')
                    ->schema([
                        PrettyJson::make('metadata')
                            ->label('Metadata')
                            ->disabled(),
                        PrettyJson::make('default_price_data')
                            ->label('Default Price Data')
                            ->disabled(),
                        PrettyJson::make('images')
                            ->label('Images')
                            ->disabled(),
                        PrettyJson::make('marketing_features')
                            ->label('Marketing Features')
                            ->disabled(),
                        PrettyJson::make('package_dimensions')
                            ->label('Package Dimensions')
                            ->disabled(),
                    ])->columns(3),

                Forms\Components\Section::make('Features')
                    ->schema([
                        Repeater::make('features')
                            ->label('Features')
                            ->relationship('featureProducts')
                            ->schema([
                                Forms\Components\Select::make('feature_id')
                                    ->label('Feature')
                                    ->options(Feature::query()->pluck('name', 'id'))
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                                        $set('unit_amount', Feature::find($state)->unit_amount ?? 0);
                                    })
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->searchable()
                                    ->columnSpan(5),
                                Forms\Components\TextInput::make('unit_amount')
                                    ->label('Unit Amount')
                                    ->dehydrated()
                                    ->numeric()
                                    ->required()
                                    ->columnSpan(1),
                            ])->columns(6)
                            ->extraItemActions([
                                Action::make('openService')
                                    ->tooltip('Abrir serviço')
                                    ->icon('heroicon-m-arrow-top-right-on-square')
                                    ->url(function (array $arguments, Repeater $component): ?string {
                                        $itemData = $component->getRawItemState($arguments['item']);

                                        $service = Feature::find($itemData['feature_id']);
                                        if (! $service) {
                                            return null;
                                        }

                                        return '';

                                        //return ServiceResource::getUrl('edit', ['record' => $service]);
                                    }, shouldOpenInNewTab: true)
                                    ->hidden(fn(array $arguments, Repeater $component): bool => blank($component->getRawItemState($arguments['item'])['feature_id'])),
                            ])
                            ->orderColumn('sort')
                            ->defaultItems(1)
                            ->hiddenLabel()
                            ->columnSpanFull()
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Tax and URL Information')
                    ->schema([
                        Forms\Components\TextInput::make('tax_code')
                            ->label('Tax Code')
                            ->maxLength(255)
                            ->readOnly(),
                        Forms\Components\TextInput::make('unit_label')
                            ->label('Unit Label')
                            ->maxLength(255)
                            ->readOnly(),
                        Forms\Components\TextInput::make('url')
                            ->label('Product URL')
                            ->maxLength(255)
                            ->readOnly(),
                    ])->columns(3),
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
            PricesRelationManager::class,
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
            ->map(fn($product) => [
                'id' => $product->id,
                'text' => "{$product->name} - {$product->id}",
            ])
            ->pluck('text', 'id')
            ->toArray();
    }
}
