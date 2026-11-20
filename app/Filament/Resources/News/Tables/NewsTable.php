<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Forms\Components\Hidden;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(fn (TextColumn $column): ?string => strlen($column->getState()) > $column->getCharacterLimit() ? $column->getState() : null),
                TextColumn::make('slug')
                    
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('published_at')
                    ->label('Dipublikasikan')
                    ->dateTime()
                    ->sortable(),
                ImageColumn::make('thumbnail')->disk('public')->visibility('public')->checkFileExistence(false)
                    ->toggleable(isToggledHiddenByDefault: true),
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
                TernaryFilter::make('published_at')
                    ->label('Status')
                    ->trueLabel('Terbit')
                    ->falseLabel('Draft')
                    ->placeholder('Semua'),
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
