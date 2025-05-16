<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Enums\Months;
use App\Filament\Resources\BudgetResource\{Pages};
use App\Models\Budget;
use Filament\Forms\Form;
use Filament\{Forms, Notifications\Notification, Tables};
use Filament\Resources\Resource;
use Filament\Tables\Table;

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;

    protected static ?string $navigationIcon = HeroIcons::CHAR_PIE;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('allocated_amount')
                            ->label(trans('budget.fields.allocated_amount'))
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('spent_amount')
                            ->label(trans('budget.fields.spent_amount'))
                            ->numeric()
                            ->default(0.00)
                            ->disabled(),
                        Forms\Components\Select::make('month')
                            ->label(trans('budget.fields.month'))
                            ->required()
                            ->options(Months::toArray()),
                        Forms\Components\Select::make('year')
                            ->label(trans('budget.fields.year'))
                            ->required()
                            ->options(self::getAvailableYears()),
                        Forms\Components\Select::make('user_id')
                            ->label(trans('budget.fields.user'))
                            ->relationship('user', 'name')
                            ->required(),
                        Forms\Components\Select::make('category_id')
                            ->label(trans('budget.fields.category'))
                            ->relationship('category', 'name')
                            ->required(),
                    ])
                ->columns(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('allocated_amount')
                    ->label(trans('budget.fields.allocated_amount'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('spent_amount')
                    ->label(trans('budget.fields.spent_amount'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('month')
                    ->label(trans('budget.fields.month'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->label(trans('budget.fields.year'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(trans('generals.timestamps.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(trans('generals.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(trans('budget.fields.user'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(trans('budget.fields.category'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->button()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->button()
                    ->color('danger')
                    ->label(trans('generals.actions.delete'))
                    ->modalHeading(trans('generals.actions.delete-item', ['item' => trans('budget.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('budget.messages.deleted.title'))
                            ->body(trans('budget.messages.deleted.body'))
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
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return trans('budget.entity');
    }

    private static function getAvailableYears(): array
    {
        return [
            now()->subYear()->year => now()->subYear()->year,
            now()->year => now()->year,
            now()->addYear()->year => now()->addYear()->year,
        ];
    }
}
