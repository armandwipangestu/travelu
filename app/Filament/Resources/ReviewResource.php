<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

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

                Forms\Components\Select::make('rating')
                    ->options([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ])
                    ->required(),

                Forms\Components\TextArea::make('comment')
                    ->required(),

                Forms\Components\View::make('avatar_display')
                    ->label('Avatar')
                    ->view('filament.components.avatar-display')
                    ->disabled(),

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
                Tables\Columns\ImageColumn::make('user.avatar')
                    ->searchable()
                    ->label('Avatar'),

                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->label('User'),

                Tables\Columns\ImageColumn::make('holiday_package.banner')
                    ->label('Banner'),

                Tables\Columns\TextColumn::make('holiday_package.title')
                    ->searchable()
                    ->label('Holiday Package'),

                Tables\Columns\TextColumn::make('rating')
                    ->searchable()
                    ->label('Rating'),

                // Tables\Columns\TextColumn::make('comment')
                //     ->searchable()
                //     ->label('Comment'),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
