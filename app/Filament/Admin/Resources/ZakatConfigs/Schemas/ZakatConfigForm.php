<?php

namespace App\Filament\Admin\Resources\ZakatConfigs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ZakatConfigForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('gold_price_per_gram')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('silver_price_per_gram')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('currency_code')
                    ->required()
                    ->default('PKR'),
            ]);
    }
}
