<?php

namespace App\Filament\Admin\Resources\SurahRecitationGuides\Pages;

use App\Filament\Admin\Resources\SurahRecitationGuides\SurahRecitationGuideResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahRecitationGuide extends EditRecord
{
    protected static string $resource = SurahRecitationGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
