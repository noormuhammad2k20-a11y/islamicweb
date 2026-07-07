<?php

namespace App\Filament\Admin\Resources\SurahFaqs;

use App\Filament\Admin\Resources\SurahFaqs\Pages\CreateSurahFaq;
use App\Filament\Admin\Resources\SurahFaqs\Pages\EditSurahFaq;
use App\Filament\Admin\Resources\SurahFaqs\Pages\ListSurahFaqs;
use App\Filament\Admin\Resources\SurahFaqs\Schemas\SurahFaqForm;
use App\Filament\Admin\Resources\SurahFaqs\Tables\SurahFaqsTable;
use App\Models\SurahFaq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahFaqResource extends Resource
{
    protected static ?string $model = SurahFaq::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahFaqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahFaqsTable::configure($table);
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
            'index' => ListSurahFaqs::route('/'),
            'create' => CreateSurahFaq::route('/create'),
            'edit' => EditSurahFaq::route('/{record}/edit'),
        ];
    }
}
