<?php

namespace App\Filament\Admin\Resources\SurahCollections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SurahCollectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_en')
                    ->required(),
                TextInput::make('name_ur')
                    ->default(null),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description_ur')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('collection_type')
                    ->required()
                    ->default('curated'),
                TextInput::make('meta_title')
                    ->default(null),
                TextInput::make('meta_description')
                    ->default(null),
                FileUpload::make('og_image')
                    ->image(),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
