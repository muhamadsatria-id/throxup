<?php

namespace App\Filament\Resources\News\Schemas;

use App\Support\ImageUploadConstraints;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('author', 'name')
                    ->label('Penulis')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->hidden()
                    ->dehydrated(false),
                ImageUploadConstraints::apply(
                    FileUpload::make('thumbnail')
                        ->previewable(false)
                        ->fetchFileInformation(false)
                        ->disk('public')->visibility('public')->directory('news')
                        ->nullable(),
                    optional: true,
                ),
                RichEditor::make('deskripsi')
                    ->label('Isi Berita')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('published_at')
                    ->label('Waktu Publikasi')
                    ->default(now())
                    ->nullable()
                    ->helperText('Bisa diubah, atau kosongkan untuk menyimpan sebagai draft.'),
            ]);
    }
}
