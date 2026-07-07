<?php

namespace App\Filament\Admin\Resources\SurahRelatedSurahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SurahRelatedSurahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('surah_id')
                    ->required()
                    ->numeric(),
                TextInput::make('related_surah_id')
                    ->required()
                    ->numeric(),
                TextInput::make('relation_type')
                    ->default(null),
                TextInput::make('relation_reason_en')
                    ->default(null),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
