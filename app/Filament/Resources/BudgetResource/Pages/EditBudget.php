<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use App\Filament\Resources\BudgetResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditBudget extends EditRecord
{
    protected static string $resource = BudgetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans('budget.messages.updated.title'))
            ->body(trans('budget.messages.updated.body'))
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label(trans('generals.actions.delete'))
                ->modalHeading(trans('generals.actions.delete-item', ['item' => trans('budget.entity')]))
                ->successNotification(
                    Notification::make()
                        ->title(trans('budget.messages.deleted.title'))
                        ->body(trans('budget.messages.deleted.body'))
                        ->success()
                ),
        ];
    }
}
