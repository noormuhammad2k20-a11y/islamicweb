<?php

namespace App\Filament\Admin\Resources\SurahEntities\Pages;

use App\Filament\Admin\Resources\SurahEntities\SurahEntityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahEntities extends ListRecords
{
    protected static string $resource = SurahEntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
