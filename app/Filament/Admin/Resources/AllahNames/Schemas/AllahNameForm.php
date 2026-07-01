<?php

namespace App\Filament\Admin\Resources\AllahNames\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AllahNameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->required()
                    ->numeric(),
                Textarea::make('arabic')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('transliteration')
                    ->required(),
                Textarea::make('meaning_english')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('meaning_urdu')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('benefits')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->required(),
            ]);
    }
}
