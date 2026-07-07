<?php

namespace App\Filament\Admin\Resources\SurahLearningPaths;

use App\Filament\Admin\Resources\SurahLearningPaths\Pages\CreateSurahLearningPath;
use App\Filament\Admin\Resources\SurahLearningPaths\Pages\EditSurahLearningPath;
use App\Filament\Admin\Resources\SurahLearningPaths\Pages\ListSurahLearningPaths;
use App\Filament\Admin\Resources\SurahLearningPaths\Schemas\SurahLearningPathForm;
use App\Filament\Admin\Resources\SurahLearningPaths\Tables\SurahLearningPathsTable;
use App\Models\SurahLearningPath;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SurahLearningPathResource extends Resource
{
    protected static ?string $model = SurahLearningPath::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SurahLearningPathForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurahLearningPathsTable::configure($table);
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
            'index' => ListSurahLearningPaths::route('/'),
            'create' => CreateSurahLearningPath::route('/create'),
            'edit' => EditSurahLearningPath::route('/{record}/edit'),
        ];
    }
}
