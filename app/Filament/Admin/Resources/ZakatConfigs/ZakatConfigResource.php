<?php

namespace App\Filament\Admin\Resources\ZakatConfigs;

use App\Filament\Admin\Resources\ZakatConfigs\Pages\CreateZakatConfig;
use App\Filament\Admin\Resources\ZakatConfigs\Pages\EditZakatConfig;
use App\Filament\Admin\Resources\ZakatConfigs\Pages\ListZakatConfigs;
use App\Filament\Admin\Resources\ZakatConfigs\Schemas\ZakatConfigForm;
use App\Filament\Admin\Resources\ZakatConfigs\Tables\ZakatConfigsTable;
use App\Models\ZakatConfig;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ZakatConfigResource extends Resource
{
    protected static ?string $model = ZakatConfig::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ZakatConfigForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ZakatConfigsTable::configure($table);
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
            'index' => ListZakatConfigs::route('/'),
            'create' => CreateZakatConfig::route('/create'),
            'edit' => EditZakatConfig::route('/{record}/edit'),
        ];
    }
}
