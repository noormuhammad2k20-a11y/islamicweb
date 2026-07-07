<?php

namespace App\Filament\Admin\Resources\SurahLearningPaths\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SurahLearningPathsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('surah_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('difficulty_level')
                    ->badge(),
                TextColumn::make('estimated_reading_minutes')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('word_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unique_roots')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('reading_difficulty_score')
                    ->numeric()
                    ->sortable(),
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
