<?php

namespace App\Filament\Admin\Resources\SurahFaqs\Pages;

use App\Filament\Admin\Resources\SurahFaqs\SurahFaqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSurahFaqs extends ListRecords
{
    protected static string $resource = SurahFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
