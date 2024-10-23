<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('stripe_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\Toggle::make('active'),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('metadata'),
                Forms\Components\TextInput::make('default_price_data'),
                Forms\Components\TextInput::make('images'),
                Forms\Components\TextInput::make('marketing_features'),
                Forms\Components\TextInput::make('package_dimensions'),
                Forms\Components\Toggle::make('shippable'),
                Forms\Components\TextInput::make('statement_descriptor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tax_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit_label')
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
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
                // Tables\Columns\TextColumn::make('description')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('shippable')
                    ->boolean(),
                Tables\Columns\TextColumn::make('statement_descriptor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tax_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_label')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('url')
                //     ->searchable(),
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
}
