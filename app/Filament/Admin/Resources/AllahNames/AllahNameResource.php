<?php

namespace App\Filament\Admin\Resources\AllahNames;

use App\Filament\Admin\Resources\AllahNames\Pages\CreateAllahName;
use App\Filament\Admin\Resources\AllahNames\Pages\EditAllahName;
use App\Filament\Admin\Resources\AllahNames\Pages\ListAllahNames;
use App\Filament\Admin\Resources\AllahNames\Schemas\AllahNameForm;
use App\Filament\Admin\Resources\AllahNames\Tables\AllahNamesTable;
use App\Models\AllahName;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AllahNameResource extends Resource
{
    protected static ?string $model = AllahName::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'transliteration';

    public static function form(Schema $schema): Schema
    {
        return AllahNameForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AllahNamesTable::configure($table);
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
            'index' => ListAllahNames::route('/'),
            'create' => CreateAllahName::route('/create'),
            'edit' => EditAllahName::route('/{record}/edit'),
        ];
    }
}
