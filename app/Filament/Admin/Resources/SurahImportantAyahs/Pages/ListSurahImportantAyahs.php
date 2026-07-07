<?php

namespace App\Filament\Admin\Resources\SurahImportantAyahs\Pages;

use App\Filament\Admin\Resources\SurahImportantAyahs\SurahImportantAyahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahImportantAyahs extends ListRecords
{
    protected static string $resource = SurahImportantAyahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
