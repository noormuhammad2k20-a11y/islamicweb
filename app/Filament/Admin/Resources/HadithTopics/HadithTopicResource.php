<?php

namespace App\Filament\Admin\Resources\HadithTopics;

use App\Filament\Admin\Resources\HadithTopics\Pages\CreateHadithTopic;
use App\Filament\Admin\Resources\HadithTopics\Pages\EditHadithTopic;
use App\Filament\Admin\Resources\HadithTopics\Pages\ListHadithTopics;
use App\Filament\Admin\Resources\HadithTopics\Schemas\HadithTopicForm;
use App\Filament\Admin\Resources\HadithTopics\Tables\HadithTopicsTable;
use App\Models\HadithTopic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HadithTopicResource extends Resource
{
    protected static ?string $model = HadithTopic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'topic_name';

    public static function form(Schema $schema): Schema
    {
        return HadithTopicForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HadithTopicsTable::configure($table);
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
            'index' => ListHadithTopics::route('/'),
            'create' => CreateHadithTopic::route('/create'),
            'edit' => EditHadithTopic::route('/{record}/edit'),
        ];
    }
}
