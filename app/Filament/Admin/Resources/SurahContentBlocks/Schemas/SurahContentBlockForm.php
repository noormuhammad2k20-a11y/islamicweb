<?php

namespace App\Filament\Admin\Resources\SurahContentBlocks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SurahContentBlockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('surah_id')
                    ->required()
                    ->numeric(),
                TextInput::make('block_type')
                    ->required(),
                Textarea::make('content_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('content_ur')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('content_ar')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('hadith_reference')
                    ->default(null),
                Select::make('authenticity')
                    ->options([
            'sahih' => 'Sahih',
            'hasan' => 'Hasan',
            'daif' => 'Daif',
            'mawdu' => 'Mawdu',
            'general_knowledge' => 'General knowledge',
            'scholarly_opinion' => 'Scholarly opinion',
        ])
                    ->default('general_knowledge')
                    ->required(),
                TextInput::make('source_name')
                    ->default(null),
                Toggle::make('is_published')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
