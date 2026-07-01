<?php

namespace App\Filament\Admin\Resources\Hadiths\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HadithForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('topic_id')
                    ->relationship('topic', 'id')
                    ->required(),
                Textarea::make('arabic_text')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('english_translation')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('urdu_translation')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('reference')
                    ->required(),
                TextInput::make('grade')
                    ->default(null),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('book_name')
                    ->required(),
                TextInput::make('chapter')
                    ->default(null),
            ]);
    }
}
