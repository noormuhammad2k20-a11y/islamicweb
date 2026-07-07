<?php

namespace App\Filament\Admin\Resources\SurahLearningPaths\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SurahLearningPathForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('surah_id')
                    ->required()
                    ->numeric(),
                Select::make('difficulty_level')
                    ->options(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'])
                    ->default('beginner')
                    ->required(),
                TextInput::make('estimated_reading_minutes')
                    ->numeric()
                    ->default(null),
                TextInput::make('word_count')
                    ->numeric()
                    ->default(null),
                TextInput::make('unique_roots')
                    ->numeric()
                    ->default(null),
                TextInput::make('reading_difficulty_score')
                    ->numeric()
                    ->default(null),
                Textarea::make('memorization_tips_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('memorization_tips_ur')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('listening_guide_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('study_notes_en')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
