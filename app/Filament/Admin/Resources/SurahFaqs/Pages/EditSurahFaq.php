<?php

namespace App\Filament\Admin\Resources\SurahFaqs\Pages;

use App\Filament\Admin\Resources\SurahFaqs\SurahFaqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSurahFaq extends EditRecord
{
    protected static string $resource = SurahFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
