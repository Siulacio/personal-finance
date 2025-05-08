<?php

declare(strict_types=1);

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans('category.messages.updated.title'))
            ->body(trans('category.messages.updated.body'))
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label(trans('generals.actions.delete'))
                ->modalHeading(trans('generals.actions.delete-item', ['item' => trans('category.entity')]))
                ->successNotification(
                    Notification::make()
                        ->title(trans('category.messages.deleted.title'))
                        ->body(trans('category.messages.deleted.body'))
                        ->success()
                ),
        ];
    }
}
