<?php

declare(strict_types=1);

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans('transaction.messages.created.title'))
            ->body(trans('transaction.messages.created.body'))
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
