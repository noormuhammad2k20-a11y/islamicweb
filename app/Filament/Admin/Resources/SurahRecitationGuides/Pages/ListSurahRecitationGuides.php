<?php

namespace App\Filament\Admin\Resources\SurahRecitationGuides\Pages;

use App\Filament\Admin\Resources\SurahRecitationGuides\SurahRecitationGuideResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahRecitationGuides extends ListRecords
{
    protected static string $resource = SurahRecitationGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
