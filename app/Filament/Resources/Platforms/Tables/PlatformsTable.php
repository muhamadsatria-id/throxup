<?php

namespace App\Filament\Resources\Platforms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PlatformsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('tiktok')->limit(40)->searchable()->toggleable(),
                TextColumn::make('facebook')->limit(40)->searchable()->toggleable(),
                TextColumn::make('instagram')->limit(40)->searchable()->toggleable(),
                TextColumn::make('shopee')->limit(40)->searchable()->toggleable(),
                TextColumn::make('tiktok_shop')->limit(40)->searchable()->toggleable(),
                TextColumn::make('tokopedia')->limit(40)->searchable()->toggleable(),
                TextColumn::make('lazada')->limit(40)->searchable()->toggleable(),
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
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
