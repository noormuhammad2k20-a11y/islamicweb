<?php

namespace App\Filament\Admin\Resources\HadithTopics\Pages;

use App\Filament\Admin\Resources\HadithTopics\HadithTopicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHadithTopics extends ListRecords
{
    protected static string $resource = HadithTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
