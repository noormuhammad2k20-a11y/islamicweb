<?php

namespace App\Filament\Admin\Resources\SurahThemes;

use App\Filament\Admin\Resources\SurahThemes\Pages\CreateSurahTheme;
use App\Filament\Admin\Resources\SurahThemes\Pages\EditSurahTheme;
use App\Filament\Admin\Resources\SurahThemes\Pages\ListSurahThemes;
use App\Filament\Admin\Resources\SurahThemes\Schemas\SurahThemeForm;
use App\Filament\Admin\Resources\SurahThemes\Tables\SurahThemesTable;
use App\Models\SurahTheme;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahThemeResource extends Resource
{
    protected static ?string $model = SurahTheme::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahThemeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahThemesTable::configure($table);
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
            'index' => ListSurahThemes::route('/'),
            'create' => CreateSurahTheme::route('/create'),
            'edit' => EditSurahTheme::route('/{record}/edit'),
        ];
    }
}
