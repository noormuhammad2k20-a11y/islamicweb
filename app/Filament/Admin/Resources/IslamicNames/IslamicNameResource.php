<?php

namespace App\Filament\Admin\Resources\IslamicNames;

use App\Filament\Admin\Resources\IslamicNames\Pages\CreateIslamicName;
use App\Filament\Admin\Resources\IslamicNames\Pages\EditIslamicName;
use App\Filament\Admin\Resources\IslamicNames\Pages\ListIslamicNames;
use App\Filament\Admin\Resources\IslamicNames\Schemas\IslamicNameForm;
use App\Filament\Admin\Resources\IslamicNames\Tables\IslamicNamesTable;
use App\Models\IslamicName;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IslamicNameResource extends Resource
{
    protected static ?string $model = IslamicName::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name_english';

    public static function form(Schema $schema): Schema
    {
        return IslamicNameForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IslamicNamesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIslamicNames::route('/'),
            'create' => CreateIslamicName::route('/create'),
            'edit' => EditIslamicName::route('/{record}/edit'),
        ];
    }
}
