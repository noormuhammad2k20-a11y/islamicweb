<?php

namespace App\Filament\Admin\Resources\SurahRelatedSurahs\Pages;

use App\Filament\Admin\Resources\SurahRelatedSurahs\SurahRelatedSurahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahRelatedSurah extends EditRecord
{
    protected static string $resource = SurahRelatedSurahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
