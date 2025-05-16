<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\CategoryTypes;
use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms\Form;
use Filament\{Forms, Notifications\Notification, Tables, Tables\Columns\TextColumn};
use Filament\Resources\Resource;
use Filament\Tables\Table;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('type')
                        ->label(trans('transaction.fields.type'))
                        ->options(CategoryTypes::toArray())
                        ->required(),
                    Forms\Components\TextInput::make('amount')
                        ->label(trans('transaction.fields.amount'))
                        ->required()
                        ->numeric(),
                    Forms\Components\RichEditor::make('description')
                        ->label(trans('transaction.fields.description'))
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('image')
                        ->label(trans('transaction.fields.image'))
                        ->image()
                        ->disk('public')
                        ->directory('images'),
                    Forms\Components\DatePicker::make('date')
                        ->label(trans('transaction.fields.date'))
                        ->required(),
                    Forms\Components\Select::make('user_id')
                        ->label(trans('transaction.fields.user'))
                        ->relationship('user', 'name')
                        ->required(),
                    Forms\Components\Select::make('category_id')
                        ->label(trans('transaction.fields.category'))
                        ->relationship('category', 'name')
                        ->required(),
                ])->columns(),
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Nro')
                    ->sortable()
                    ->rowIndex(),
                TextColumn::make('type')
                    ->label(trans('transaction.fields.type'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('amount')
                    ->label(trans('transaction.fields.amount'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label(trans('transaction.fields.image'))
                    ->width(50)
                    ->height(50),
                TextColumn::make('date')
                    ->label(trans('transaction.fields.date'))
                    ->date()
                    ->sortable(),
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
                TextColumn::make('user.name')
                    ->label(trans('transaction.fields.user'))
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label(trans('transaction.fields.category'))
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->label(trans('transaction.fields.description'))
                    ->limit(50)
                    ->html(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
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
                    ->modalHeading(trans('generals.actions.delete-item', ['item' => trans('transaction.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('transaction.messages.deleted.title'))
                            ->body(trans('transaction.messages.deleted.body'))
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return trans('transaction.entity');
    }
}
