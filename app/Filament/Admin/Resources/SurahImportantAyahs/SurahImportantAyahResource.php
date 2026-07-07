<?php

namespace App\Filament\Admin\Resources\SurahImportantAyahs;

use App\Filament\Admin\Resources\SurahImportantAyahs\Pages\CreateSurahImportantAyah;
use App\Filament\Admin\Resources\SurahImportantAyahs\Pages\EditSurahImportantAyah;
use App\Filament\Admin\Resources\SurahImportantAyahs\Pages\ListSurahImportantAyahs;
use App\Filament\Admin\Resources\SurahImportantAyahs\Schemas\SurahImportantAyahForm;
use App\Filament\Admin\Resources\SurahImportantAyahs\Tables\SurahImportantAyahsTable;
use App\Models\SurahImportantAyah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahImportantAyahResource extends Resource
{
    protected static ?string $model = SurahImportantAyah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahImportantAyahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahImportantAyahsTable::configure($table);
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
            'index' => ListSurahImportantAyahs::route('/'),
            'create' => CreateSurahImportantAyah::route('/create'),
            'edit' => EditSurahImportantAyah::route('/{record}/edit'),
        ];
    }
}
