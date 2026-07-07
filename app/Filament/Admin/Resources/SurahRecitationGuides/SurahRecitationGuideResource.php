<?php

namespace App\Filament\Admin\Resources\SurahRecitationGuides;

use App\Filament\Admin\Resources\SurahRecitationGuides\Pages\CreateSurahRecitationGuide;
use App\Filament\Admin\Resources\SurahRecitationGuides\Pages\EditSurahRecitationGuide;
use App\Filament\Admin\Resources\SurahRecitationGuides\Pages\ListSurahRecitationGuides;
use App\Filament\Admin\Resources\SurahRecitationGuides\Schemas\SurahRecitationGuideForm;
use App\Filament\Admin\Resources\SurahRecitationGuides\Tables\SurahRecitationGuidesTable;
use App\Models\SurahRecitationGuide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahRecitationGuideResource extends Resource
{
    protected static ?string $model = SurahRecitationGuide::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahRecitationGuideForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahRecitationGuidesTable::configure($table);
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
            'index' => ListSurahRecitationGuides::route('/'),
            'create' => CreateSurahRecitationGuide::route('/create'),
            'edit' => EditSurahRecitationGuide::route('/{record}/edit'),
        ];
    }
}
