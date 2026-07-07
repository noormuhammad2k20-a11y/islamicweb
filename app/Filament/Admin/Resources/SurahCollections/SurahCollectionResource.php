<?php

namespace App\Filament\Admin\Resources\SurahCollections;

use App\Filament\Admin\Resources\SurahCollections\Pages\CreateSurahCollection;
use App\Filament\Admin\Resources\SurahCollections\Pages\EditSurahCollection;
use App\Filament\Admin\Resources\SurahCollections\Pages\ListSurahCollections;
use App\Filament\Admin\Resources\SurahCollections\Schemas\SurahCollectionForm;
use App\Filament\Admin\Resources\SurahCollections\Tables\SurahCollectionsTable;
use App\Models\SurahCollection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahCollectionResource extends Resource
{
    protected static ?string $model = SurahCollection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahCollectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahCollectionsTable::configure($table);
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
            'index' => ListSurahCollections::route('/'),
            'create' => CreateSurahCollection::route('/create'),
            'edit' => EditSurahCollection::route('/{record}/edit'),
        ];
    }
}
