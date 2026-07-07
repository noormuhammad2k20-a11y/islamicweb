<?php

namespace App\Filament\Admin\Resources\SurahEntities;

use App\Filament\Admin\Resources\SurahEntities\Pages\CreateSurahEntity;
use App\Filament\Admin\Resources\SurahEntities\Pages\EditSurahEntity;
use App\Filament\Admin\Resources\SurahEntities\Pages\ListSurahEntities;
use App\Filament\Admin\Resources\SurahEntities\Schemas\SurahEntityForm;
use App\Filament\Admin\Resources\SurahEntities\Tables\SurahEntitiesTable;
use App\Models\SurahEntity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahEntityResource extends Resource
{
    protected static ?string $model = SurahEntity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahEntityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahEntitiesTable::configure($table);
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
            'index' => ListSurahEntities::route('/'),
            'create' => CreateSurahEntity::route('/create'),
            'edit' => EditSurahEntity::route('/{record}/edit'),
        ];
    }
}
