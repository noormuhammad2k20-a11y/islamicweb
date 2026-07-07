<?php

namespace App\Filament\Admin\Resources\SurahContentBlocks\Pages;

use App\Filament\Admin\Resources\SurahContentBlocks\SurahContentBlockResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahContentBlocks extends ListRecords
{
    protected static string $resource = SurahContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
