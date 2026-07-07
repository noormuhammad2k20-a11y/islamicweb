<?php

namespace App\Filament\Admin\Resources\SurahFaqs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SurahFaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('surah_id')
                    ->required()
                    ->numeric(),
                Textarea::make('question_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('question_ur')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('answer_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('answer_ur')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('intent_type')
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
