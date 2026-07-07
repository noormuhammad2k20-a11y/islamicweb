<?php

namespace App\Filament\Admin\Resources\SurahLearningPaths\Pages;

use App\Filament\Admin\Resources\SurahLearningPaths\SurahLearningPathResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahLearningPath extends EditRecord
{
    protected static string $resource = SurahLearningPathResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
