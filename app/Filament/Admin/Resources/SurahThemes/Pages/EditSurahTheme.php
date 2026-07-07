<?php

namespace App\Filament\Admin\Resources\SurahThemes\Pages;

use App\Filament\Admin\Resources\SurahThemes\SurahThemeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahTheme extends EditRecord
{
    protected static string $resource = SurahThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
