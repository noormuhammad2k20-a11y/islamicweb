<?php

namespace App\Filament\Admin\Resources\SurahThemes\Pages;

use App\Filament\Admin\Resources\SurahThemes\SurahThemeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahThemes extends ListRecords
{
    protected static string $resource = SurahThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
