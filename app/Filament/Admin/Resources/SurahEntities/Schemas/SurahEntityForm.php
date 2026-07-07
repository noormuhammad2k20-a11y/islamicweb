<?php

namespace App\Filament\Admin\Resources\SurahEntities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SurahEntityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('entity_type')
                    ->required(),
                TextInput::make('entity_name_en')
                    ->required(),
                TextInput::make('entity_name_ar')
                    ->default(null),
                TextInput::make('entity_name_ur')
                    ->default(null),
                Textarea::make('description_en')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('wikipedia_slug')
                    ->default(null),
            ]);
    }
}
