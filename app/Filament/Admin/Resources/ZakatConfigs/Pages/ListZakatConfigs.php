<?php

namespace App\Filament\Admin\Resources\ZakatConfigs\Pages;

use App\Filament\Admin\Resources\ZakatConfigs\ZakatConfigResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListZakatConfigs extends ListRecords
{
    protected static string $resource = ZakatConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
