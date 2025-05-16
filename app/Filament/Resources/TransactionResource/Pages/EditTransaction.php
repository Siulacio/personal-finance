<?php

declare(strict_types=1);

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTransaction extends EditRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans('transaction.messages.updated.title'))
            ->body(trans('transaction.messages.updated.body'))
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label(trans('generals.actions.delete'))
                ->modalHeading(trans('generals.actions.delete-item', ['item' => trans('transaction.entity')]))
                ->successNotification(
                    Notification::make()
                        ->title(trans('transaction.messages.deleted.title'))
                        ->body(trans('transaction.messages.deleted.body'))
                        ->success()
                ),
        ];
    }
}
