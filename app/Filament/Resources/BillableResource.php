<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BillableResource\Pages;
use App\Filament\Resources\BillableResource\RelationManagers;
use App\Models\Billable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Novadaemon\FilamentPrettyJson\PrettyJson;

class BillableResource extends Resource
{
    protected static ?string $model = Billable::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        $billables = Billable::pluck('name', 'stripe_id');

        return $form
            ->schema([
                Forms\Components\Select::make('stripe_id')
                    ->required()
                    ->options(fn(Get $get): array => self::getBillables())
                    ->disableOptionWhen(fn (string $value): bool => $billables->has($value))
                    ->searchable()
                    ->columnSpan(3),
                Forms\Components\TextInput::make('stripe_id')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('balance')
                    ->readonly()
                    ->numeric(),
                PrettyJson::make('address')->disabled(),
                PrettyJson::make('metadata')->disabled(),
                PrettyJson::make('shipping')->disabled(),
                PrettyJson::make('cash_balance')->disabled(),
                PrettyJson::make('discount')->disabled(),
                PrettyJson::make('invoice_credit_balance')->disabled(),
                PrettyJson::make('invoice_settings')->disabled(),
                PrettyJson::make('preferred_locales')->disabled(),
                PrettyJson::make('sources')->disabled(),
                Forms\Components\Toggle::make('delinquent')->disabled(),
                Forms\Components\TextInput::make('invoice_prefix')
                    ->maxLength(255)
                    ->readonly(),
                Forms\Components\Toggle::make('livemode')
                    ->disabled(),
                Forms\Components\TextInput::make('next_invoice_sequence')
                    ->readonly()
                    ->numeric(),
                Forms\Components\TextInput::make('tax_exempt')
                    ->readonly(),
                PrettyJson::make('tax')
                    ->disabled(),
                PrettyJson::make('tax_ids')
                    ->disabled(),
                Forms\Components\TextInput::make('test_clock')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('default_source')
                    ->readonly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('created')
                    ->readonly()
                    ->numeric()
                    ->maxLength(255),
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

    public static function getBillables(): array
    {
        $stripe = new \Stripe\StripeClient('sk_test_51F1LcNKBVLqcMf8uiZFt0152gJpn08YTEOx3zsssdL6CAJ0nPCJborB5n0euDV2l8LA2kZByttfGuAk0l02lPh04008199G2r0');

        $customers = $stripe->customers->all(['limit' => 100])->data;

        return collect($customers)
            ->map(fn($customer) => [
                'id' => $customer->id,
                'text' => "{$customer->name} ({$customer->email}) - {$customer->id}",
            ])
            ->pluck('text', 'id')
            ->toArray();
    }
}
