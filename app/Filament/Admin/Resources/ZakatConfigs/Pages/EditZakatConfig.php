<?php

namespace App\Filament\Admin\Resources\ZakatConfigs\Pages;

use App\Filament\Admin\Resources\ZakatConfigs\ZakatConfigResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditZakatConfig extends EditRecord
{
    protected static string $resource = ZakatConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
