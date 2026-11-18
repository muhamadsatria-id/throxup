<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'nama')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(false)
                    ->helperText('Diisi otomatis oleh sistem.'),
                TextInput::make('sku')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('deskripsi')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                TagsInput::make('benefits')
                    ->nullable()->helperText('(opsional)')
                    ->helperText('Tekan Enter untuk menambah keunggulan.')
                    ->columnSpanFull(),
                RichEditor::make('detail_produk')
                    ->nullable()
                    ->helperText('(opsional) Tampil sebagai konten rich text di bagian Detail Produk halaman produk.')
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->image()
                    ->multiple()
                    ->disk('public')->directory('products')
                    ->nullable()->helperText('(opsional)')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
