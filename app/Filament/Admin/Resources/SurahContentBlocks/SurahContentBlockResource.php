<?php

namespace App\Filament\Admin\Resources\SurahContentBlocks;

use App\Filament\Admin\Resources\SurahContentBlocks\Pages\CreateSurahContentBlock;
use App\Filament\Admin\Resources\SurahContentBlocks\Pages\EditSurahContentBlock;
use App\Filament\Admin\Resources\SurahContentBlocks\Pages\ListSurahContentBlocks;
use App\Filament\Admin\Resources\SurahContentBlocks\Schemas\SurahContentBlockForm;
use App\Filament\Admin\Resources\SurahContentBlocks\Tables\SurahContentBlocksTable;
use App\Models\SurahContentBlock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahContentBlockResource extends Resource
{
    protected static ?string $model = SurahContentBlock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahContentBlockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahContentBlocksTable::configure($table);
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
            'index' => ListSurahContentBlocks::route('/'),
            'create' => CreateSurahContentBlock::route('/create'),
            'edit' => EditSurahContentBlock::route('/{record}/edit'),
        ];
    }
}
