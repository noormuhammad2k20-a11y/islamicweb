<?php

namespace App\Filament\Admin\Resources\IslamicNames\Pages;

use App\Filament\Admin\Resources\IslamicNames\IslamicNameResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIslamicName extends EditRecord
{
    protected static string $resource = IslamicNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
