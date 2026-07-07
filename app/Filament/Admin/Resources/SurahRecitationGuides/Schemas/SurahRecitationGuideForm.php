<?php

namespace App\Filament\Admin\Resources\SurahRecitationGuides\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SurahRecitationGuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('surah_id')
                    ->required()
                    ->numeric(),
                TextInput::make('reciter_name_en')
                    ->required(),
                TextInput::make('reciter_name_ur')
                    ->default(null),
                TextInput::make('audio_url')
                    ->url()
                    ->default(null),
                TextInput::make('style')
                    ->default(null),
                Textarea::make('description_en')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
