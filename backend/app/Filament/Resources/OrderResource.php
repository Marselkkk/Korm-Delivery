<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Заказы';

    protected static ?string $modelLabel = 'Заказ';

    protected static ?string $pluralModelLabel = 'Заказы';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Данные доставки')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('city')
                        ->label('Город')
                        ->required(),

                    Forms\Components\TextInput::make('phone')
                        ->label('Телефон')
                        ->required(),

                    Forms\Components\TextInput::make('street')
                        ->label('Улица')
                        ->required(),

                    Forms\Components\TextInput::make('house')
                        ->label('Дом')
                        ->required(),
                ]),

            Forms\Components\Section::make('Статус')
                ->schema([
                    Forms\Components\Select::make('status')
                        ->label('Статус')
                        ->options([
                            'new'        => 'Новый',
                            'processing' => 'В обработке',
                            'completed'  => 'Выполнен',
                            'cancelled'  => 'Отменён',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('total_price')
                        ->label('Сумма заказа')
                        ->numeric()
                        ->suffix('₽')
                        ->disabled(),
                ]),

            Forms\Components\Section::make('Состав заказа')
                ->schema([
                    Forms\Components\Repeater::make('items')
                        ->relationship()
                        ->label('')
                        ->addable(false)
                        ->deletable(false)
                        ->schema([
                            Forms\Components\TextInput::make('product_name')
                                ->label('Товар')
                                ->disabled(),

                            Forms\Components\TextInput::make('weight_label')
                                ->label('Вес/вариант')
                                ->disabled(),

                            Forms\Components\TextInput::make('price')
                                ->label('Цена за ед., ₽')
                                ->disabled(),

                            Forms\Components\TextInput::make('quantity')
                                ->label('Кол-во')
                                ->disabled(),
                        ])
                        ->columns(4),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('№')
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable(),

                Tables\Columns\TextColumn::make('city')
                    ->label('Город')
                    ->searchable(),

                Tables\Columns\TextColumn::make('street')
                    ->label('Улица'),

                Tables\Columns\TextColumn::make('house')
                    ->label('Дом'),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('Сумма')
                    ->money('RUB')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Статус')
                    ->colors([
                        'warning' => 'new',
                        'primary' => 'processing',
                        'success' => 'completed',
                        'danger'  => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new'        => 'Новый',
                        'processing' => 'В обработке',
                        'completed'  => 'Выполнен',
                        'cancelled'  => 'Отменён',
                        default      => $state,
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'new'        => 'Новый',
                        'processing' => 'В обработке',
                        'completed'  => 'Выполнен',
                        'cancelled'  => 'Отменён',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Открыть'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit'  => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
