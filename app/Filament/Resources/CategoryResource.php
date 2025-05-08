<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\{Forms, Notifications\Notification, Tables, Tables\Columns\TextColumn};
use Filament\Resources\Resource;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(trans('category.fields.name'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('type')
                            ->label(trans('category.fields.type'))
                            ->options(\App\Enums\CategoryTypes::toArray())
                            ->required(),
                    ])
                    ->columns(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->rowIndex(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options(\App\Enums\CategoryTypes::toArray())
                    ->placeholder(trans('category.filters.type'))
                    ->label(trans('category.fields.type')),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->button()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->button()
                    ->color('danger')
                    ->label(trans('generals.actions.delete'))
                    ->modalHeading(trans('generals.actions.delete-item', ['item' => trans('category.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('category.messages.deleted.title'))
                            ->body(trans('category.messages.deleted.body'))
                            ->success()
                    ),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
