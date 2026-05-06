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
        return $form->schema([

            Forms\Components\TextInput::make('name')
                ->required(),

            Forms\Components\Textarea::make('description'),

            // Картинки
            Forms\Components\Repeater::make('images')
                ->relationship()
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->required(),
                ]),

            // Веса
            Forms\Components\Repeater::make('weights')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('weight')
                        ->required(),

                    Forms\Components\TextInput::make('price')
                        ->numeric()
                        ->required(),
                ]),
                Forms\Components\Repeater::make('productNutrients')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('nutrient_id')
                            ->label('Nutrient')
                            ->relationship('nutrient', 'name')
                            ->searchable()
                            ->required(),

                        Forms\Components\TextInput::make('amount')
                            ->numeric()
                            ->required(),
                    ]),
            // Связанные товары
            Forms\Components\Select::make('relatedProducts')
                ->multiple()
                ->relationship('relatedProducts', 'name'),

            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->searchable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->sortable(),

                Tables\Columns\ImageColumn::make('images.image')
                    ->label('Фото')
                    ->circular()
                    ->limit(1),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50),

                Tables\Columns\TextColumn::make('weights.weight')
                    ->label('Вес')
                    ->badge(),

                Tables\Columns\TextColumn::make('nutrients.name')
                    ->label('Нутриенты')
                    ->badge(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
