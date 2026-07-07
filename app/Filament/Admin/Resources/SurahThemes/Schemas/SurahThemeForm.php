<?php

namespace App\Filament\Admin\Resources\SurahThemes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SurahThemeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('surah_id')
                    ->required()
                    ->numeric(),
                TextInput::make('theme_title_en')
                    ->required(),
                TextInput::make('theme_title_ur')
                    ->default(null),
                Textarea::make('theme_description_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('theme_description_ur')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('icon_class')
                    ->default(null),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
