<?php

namespace App\Filament\Admin\Resources\SurahCollections\Pages;

use App\Filament\Admin\Resources\SurahCollections\SurahCollectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahCollection extends EditRecord
{
    protected static string $resource = SurahCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
