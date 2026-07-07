<?php

namespace App\Filament\Admin\Resources\SurahEntities\Pages;

use App\Filament\Admin\Resources\SurahEntities\SurahEntityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahEntity extends EditRecord
{
    protected static string $resource = SurahEntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
