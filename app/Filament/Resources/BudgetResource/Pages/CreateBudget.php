<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use App\Filament\Resources\BudgetResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateBudget extends CreateRecord
{
    protected static string $resource = BudgetResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans('budget.messages.created.title'))
            ->body(trans('budget.messages.created.body'))
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label(trans('generals.actions.save')),
            $this->getCancelFormAction()->label(trans('generals.actions.cancel')),
        ];
    }
}
