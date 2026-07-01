<?php

namespace App\Filament\Admin\Resources\AllahNames\Pages;

use App\Filament\Admin\Resources\AllahNames\AllahNameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAllahNames extends ListRecords
{
    protected static string $resource = AllahNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
