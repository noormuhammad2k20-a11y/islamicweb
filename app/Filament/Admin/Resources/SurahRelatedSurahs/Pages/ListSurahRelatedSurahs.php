<?php

namespace App\Filament\Admin\Resources\SurahRelatedSurahs\Pages;

use App\Filament\Admin\Resources\SurahRelatedSurahs\SurahRelatedSurahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahRelatedSurahs extends ListRecords
{
    protected static string $resource = SurahRelatedSurahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
