<?php

namespace App\Filament\Admin\Resources\SurahEntities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SurahEntitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('entity_type')
                    ->searchable(),
                TextColumn::make('entity_name_en')
                    ->searchable(),
                TextColumn::make('entity_name_ar')
                    ->searchable(),
                TextColumn::make('entity_name_ur')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('wikipedia_slug')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
