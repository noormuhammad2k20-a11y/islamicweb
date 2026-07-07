<?php

namespace App\Filament\Admin\Resources\SurahCollections\Pages;

use App\Filament\Admin\Resources\SurahCollections\SurahCollectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahCollections extends ListRecords
{
    protected static string $resource = SurahCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
