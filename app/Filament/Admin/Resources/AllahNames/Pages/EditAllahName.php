<?php

namespace App\Filament\Admin\Resources\AllahNames\Pages;

use App\Filament\Admin\Resources\AllahNames\AllahNameResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAllahName extends EditRecord
{
    protected static string $resource = AllahNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
