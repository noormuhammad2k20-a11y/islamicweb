<?php

namespace App\Filament\Admin\Resources\SurahImportantAyahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SurahImportantAyahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('surah_id')
                    ->required()
                    ->numeric(),
                TextInput::make('ayah_id')
                    ->required()
                    ->numeric(),
                TextInput::make('label_en')
                    ->default(null),
                TextInput::make('label_ur')
                    ->default(null),
                Textarea::make('significance_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('significance_ur')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('anchor_id')
                    ->default(null),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
