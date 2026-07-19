<?php

namespace App\Filament\Admin\Resources\IslamicNames\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IslamicNamesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name_arabic')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('name_english')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('translation_urdu')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('gender')
                    ->badge(),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => $state === 'active' ? 'success' : 'danger'),
                \Filament\Tables\Columns\IconColumn::make('is_quranic')
                    ->boolean(),
                \Filament\Tables\Columns\TextColumn::make('origin')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('favorited_count')
                    ->numeric()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                \Filament\Tables\Columns\IconColumn::make('is_verified')
                    ->boolean(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                \Filament\Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive']),
                \Filament\Tables\Filters\SelectFilter::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female']),
                \Filament\Tables\Filters\TernaryFilter::make('is_quranic')->label('Quranic Names'),
            ])
            ->recordActions([
                EditAction::make(),
                \Filament\Tables\Actions\Action::make('toggle_status')
                    ->label(fn ($record) => $record->status === 'active' ? 'Deactivate' : 'Activate')
                    ->action(fn ($record) => $record->update([
                        'status' => $record->status === 'active' ? 'inactive' : 'active'
                    ]))
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
