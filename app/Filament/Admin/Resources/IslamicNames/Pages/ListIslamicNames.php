<?php

namespace App\Filament\Admin\Resources\IslamicNames\Pages;

use App\Filament\Admin\Resources\IslamicNames\IslamicNameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIslamicNames extends ListRecords
{
    protected static string $resource = IslamicNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
