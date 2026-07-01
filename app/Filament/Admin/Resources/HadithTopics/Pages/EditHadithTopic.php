<?php

namespace App\Filament\Admin\Resources\HadithTopics\Pages;

use App\Filament\Admin\Resources\HadithTopics\HadithTopicResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHadithTopic extends EditRecord
{
    protected static string $resource = HadithTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
