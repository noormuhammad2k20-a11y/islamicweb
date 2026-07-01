<?php

namespace App\Filament\Admin\Resources\IslamicNames\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class IslamicNameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_arabic')
                    ->required(),
                TextInput::make('name_english')
                    ->required(),
                TextInput::make('translation_urdu')
                    ->required(),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female', 'unisex' => 'Unisex'])
                    ->required(),
                TextInput::make('origin')
                    ->default(null),
                TextInput::make('favorited_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('slug')
                    ->required(),
                Toggle::make('is_verified')
                    ->required(),
            ]);
    }
}
