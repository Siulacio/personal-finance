<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Enums\CategoryTypes;
use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\{Forms,
    Forms\Components\Section,
    Forms\Components\TextInput,
    Notifications\Notification,
    Tables,
    Tables\Columns\TextColumn,
    Tables\Filters\SelectFilter};
use Filament\Resources\Resource;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = HeroIcons::RECTANGLE_STACK;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label(trans('category.fields.name'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('type')
                            ->label(trans('category.fields.type'))
                            ->options(CategoryTypes::toArray())
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
                    ->label('Nro')
                    ->sortable()
                    ->rowIndex(),
                TextColumn::make('name')
                    ->label(trans('category.fields.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->label(trans('category.fields.type'))
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state): string {
                        return trans('category.types.' . $state);
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        CategoryTypes::INCOME->value => 'success',
                        CategoryTypes::EXPENSE->value => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label(trans('generals.timestamps.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(trans('generals.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(CategoryTypes::toArray())
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

    public static function getModelLabel(): string
    {
        return trans('category.entity');
    }
}
