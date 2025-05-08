<?php

declare(strict_types=1);

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    public function getTitle(): string|Htmlable
    {
        return trans('category.title.create');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans('category.messages.created.title'))
            ->body(trans('category.messages.created.body'))
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
