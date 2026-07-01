<?php

namespace App\Filament\Admin\Resources\HadithTopics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HadithTopicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('topic_name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('hadith_book')
                    ->default(null),
                TextInput::make('hadith_number')
                    ->default(null),
            ]);
    }
}
