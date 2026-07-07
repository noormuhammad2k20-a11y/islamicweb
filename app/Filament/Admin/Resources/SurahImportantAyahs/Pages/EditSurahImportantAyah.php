<?php

namespace App\Filament\Admin\Resources\SurahImportantAyahs\Pages;

use App\Filament\Admin\Resources\SurahImportantAyahs\SurahImportantAyahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahImportantAyah extends EditRecord
{
    protected static string $resource = SurahImportantAyahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
