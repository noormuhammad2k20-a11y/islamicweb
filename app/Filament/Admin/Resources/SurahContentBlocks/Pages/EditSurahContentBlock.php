<?php

namespace App\Filament\Admin\Resources\SurahContentBlocks\Pages;

use App\Filament\Admin\Resources\SurahContentBlocks\SurahContentBlockResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahContentBlock extends EditRecord
{
    protected static string $resource = SurahContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
