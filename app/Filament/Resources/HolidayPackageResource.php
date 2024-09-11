<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HolidayPackageResource\Pages;
use App\Filament\Resources\HolidayPackageResource\RelationManagers;
use App\Models\HolidayPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class HolidayPackageResource extends Resource
{
    protected static ?string $model = HolidayPackage::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->live(debounce: 2500)
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->disabled(),

                Forms\Components\Textarea::make('description'),

                Forms\Components\TextInput::make('price')
                    ->required(),

                Forms\Components\Select::make('destination_id')
                    ->relationship('destination', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\DatePicker::make('available_from')
                    ->required(),

                Forms\Components\DatePicker::make('available_to')
                    ->required(),

                Forms\Components\FileUpload::make('banner')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner'),

                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->label('Category'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->searchable(),

                Tables\Columns\TextColumn::make('destination.name')
                    ->searchable()
                    ->label('Destination'),

                Tables\Columns\TextColumn::make('available_from')
                    ->searchable(),

                Tables\Columns\TextColumn::make('available_to')
                    ->searchable(),
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
            'index' => Pages\ListHolidayPackages::route('/'),
            'create' => Pages\CreateHolidayPackage::route('/create'),
            'edit' => Pages\EditHolidayPackage::route('/{record}/edit'),
        ];
    }
}
