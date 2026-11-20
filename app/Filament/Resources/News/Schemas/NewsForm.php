<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\Hidden;
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
                    ->required()
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(false)
                    ->hidden()
                    ->helperText('Diisi otomatis oleh sistem.'),
                FileUpload::make('thumbnail')
                    ->image()
                    ->previewable(false)
                    ->fetchFileInformation(false)
                    ->disk('public')->visibility('public')->directory('news')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/bmp', 'image/svg+xml'])
                    ->nullable()->helperText('(opsional)'),
                RichEditor::make('deskripsi')
                    ->label('Isi Berita')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('published_at')
                    ->label('Waktu Publikasi')
                    ->nullable()->helperText('(opsional)')
                    ->helperText('Kosongkan untuk menyimpan sebagai draft.'),
            ]);
    }
}
