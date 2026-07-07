<?php

namespace App\Filament\Admin\Resources\SurahRelatedSurahs;

use App\Filament\Admin\Resources\SurahRelatedSurahs\Pages\CreateSurahRelatedSurah;
use App\Filament\Admin\Resources\SurahRelatedSurahs\Pages\EditSurahRelatedSurah;
use App\Filament\Admin\Resources\SurahRelatedSurahs\Pages\ListSurahRelatedSurahs;
use App\Filament\Admin\Resources\SurahRelatedSurahs\Schemas\SurahRelatedSurahForm;
use App\Filament\Admin\Resources\SurahRelatedSurahs\Tables\SurahRelatedSurahsTable;
use App\Models\SurahRelatedSurah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahRelatedSurahResource extends Resource
{
    protected static ?string $model = SurahRelatedSurah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahRelatedSurahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahRelatedSurahsTable::configure($table);
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
            'index' => ListSurahRelatedSurahs::route('/'),
            'create' => CreateSurahRelatedSurah::route('/create'),
            'edit' => EditSurahRelatedSurah::route('/{record}/edit'),
        ];
    }
}
