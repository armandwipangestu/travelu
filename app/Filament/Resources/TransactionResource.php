<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('package_id')
                    ->relationship('holiday_package', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\DatePicker::make('transaction_date')
                    ->required(),

                Forms\Components\Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                        'waiting' => 'Waiting',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('midtrans_url')
                    ->required(),

                Forms\Components\TextInput::make('midtrans_booking_code')
                    ->required(),

                Forms\Components\View::make('banner_display')
                    ->label('Banner')
                    ->view('filament.components.banner-display')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->label('User'),

                Tables\Columns\ImageColumn::make('holiday_package.banner')
                    ->label('Banner'),

                Tables\Columns\TextColumn::make('holiday_package.title')
                    ->searchable()
                    ->label('Holiday Package'),

                Tables\Columns\TextColumn::make('transaction_date')
                    ->label('Transaction Date'),

                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'failed' => 'danger',
                        'waiting' => 'info',
                    }),

                Tables\Columns\TextColumn::make('midtrans_url')
                    ->label('Url'),

                Tables\Columns\TextColumn::make('midtrans_booking_code')
                    ->label('Booking Code'),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
