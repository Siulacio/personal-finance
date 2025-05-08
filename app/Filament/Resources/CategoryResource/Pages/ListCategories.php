<?php

declare(strict_types=1);

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function configureCreateAction(CreateAction|\Filament\Tables\Actions\CreateAction $action): void
    {
        parent::configureCreateAction($action);

        $action->modelLabel(trans('category.entity'));
    }
}
