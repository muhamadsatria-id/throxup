<?php

namespace App\Filament\RelationManagers;

use App\Support\ImageUploadConstraints;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class SeoMetaRelationManager extends RelationManager
{
    protected static string $relationship = 'seoMeta';

    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
    {
        return false;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Meta Title')
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(70)
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->label('Meta Description')
                    ->nullable()->helperText('(opsional)')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('keyword')
                    ->label('Meta Keywords')
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('canonical_url')
                    ->label('Canonical URL')
                    ->url()
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Select::make('robots')
                    ->options([
                        'index, follow' => 'index, follow',
                        'noindex, nofollow' => 'noindex, nofollow',
                    ])
                    ->default('index, follow')
                    ->required(),
                ImageUploadConstraints::apply(
                    FileUpload::make('og_image')
                        ->label('OG Image')
                        ->disk('public')->visibility('public')->directory('seo')
                        ->nullable(),
                    optional: true,
                ),
                KeyValue::make('schema_json')
                    ->label('Schema JSON-LD')
                    ->nullable()->helperText('(opsional)')
                    ->keyLabel('Properti')
                    ->valueLabel('Nilai')
                    ->columnSpanFull(),
                Toggle::make('is_manual')
                    ->label('Diisi Manual')
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->label('Meta Title')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('robots')
                    ->searchable(),
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
                //
            ])
            ->headerActions([
                CreateAction::make(),
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
