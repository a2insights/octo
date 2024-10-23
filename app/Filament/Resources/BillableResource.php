<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BillableResource\Pages;
use App\Filament\Resources\BillableResource\RelationManagers;
use App\Models\Billable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BillableResource extends Resource
{
    protected static ?string $model = Billable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('stripe_id')
                    ->maxLength(255),
                // Forms\Components\TextInput::make('address'),
                // Forms\Components\TextInput::make('description')
                //     ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('metadata'),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping'),
                Forms\Components\TextInput::make('cash_balance'),
                Forms\Components\TextInput::make('balance')
                    ->numeric(),
                Forms\Components\TextInput::make('default_source'),
                Forms\Components\Toggle::make('delinquent'),
                Forms\Components\TextInput::make('discount'),
                Forms\Components\TextInput::make('invoice_credit_balance'),
                Forms\Components\TextInput::make('invoice_prefix')
                    ->maxLength(255),
                Forms\Components\TextInput::make('invoice_settings'),
                Forms\Components\Toggle::make('livemode'),
                Forms\Components\TextInput::make('next_invoice_sequence')
                    ->numeric(),
                // Forms\Components\TextInput::make('preferred_locales'),
                // Forms\Components\TextInput::make('sources'),
                // Forms\Components\TextInput::make('subscriptions'),
                // Forms\Components\TextInput::make('tax_exempt'),
                // Forms\Components\TextInput::make('tax'),
                // Forms\Components\TextInput::make('tax_ids'),
                // Forms\Components\TextInput::make('test_clock')
                //     ->maxLength(255),
                // Forms\Components\DateTimePicker::make('created'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stripe_id')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('description')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('name')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('phone')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('balance')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('delinquent')
                    ->boolean(),
                Tables\Columns\TextColumn::make('invoice_prefix')
                    ->searchable(),
                Tables\Columns\IconColumn::make('livemode')
                    ->boolean(),
                Tables\Columns\TextColumn::make('next_invoice_sequence')
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('tax_exempt'),
                // Tables\Columns\TextColumn::make('test_clock')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('created')
                //     ->dateTime()
                //     ->sortable(),
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
            'index' => Pages\ListBillables::route('/'),
            'create' => Pages\CreateBillable::route('/create'),
            'edit' => Pages\EditBillable::route('/{record}/edit'),
        ];
    }
}
