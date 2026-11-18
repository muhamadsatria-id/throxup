<?php

namespace App\Filament\Resources\SeoMetas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class SeoMetasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Meta Title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('seoable_type')
                    ->label('Model')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('seoable_id')
                    ->label('ID Model')
                    ->sortable(),
                TextColumn::make('robots')
                    ->searchable(),
                TextColumn::make('keyword')
                    ->label('Keywords')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('canonical_url')
                    ->label('Canonical')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('og_image')->disk('public')
                    ->label('OG Image')
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_manual')
                    ->label('Manual')
                    ->boolean(),
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
                TernaryFilter::make('is_manual')
                    ->label('Manual'),
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
