<?php

namespace App\Filament\Admin\Resources\SurahLearningPaths\Pages;

use App\Filament\Admin\Resources\SurahLearningPaths\SurahLearningPathResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahLearningPaths extends ListRecords
{
    protected static string $resource = SurahLearningPathResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
