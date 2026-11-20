<?php

namespace App\Filament\Resources\Profiles\Schemas;

use App\Support\ImageUploadConstraints;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Perusahaan')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('deskripsi')
                    ->label('Profil Singkat')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('vision')
                    ->label('Visi')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                TagsInput::make('mission')
                    ->label('Misi')
                    ->nullable()->helperText('(opsional)')
                    ->helperText('Tekan Enter untuk menambah poin misi.')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Telepon')
                    ->required()
                    ->maxLength(255),
                TextInput::make('whatsapp')
                    ->label('WhatsApp')
                    ->required()
                    ->maxLength(255),
                Textarea::make('address')
                    ->label('Alamat')
                    ->nullable()->helperText('(opsional)')
                    ->rows(3)
                    ->columnSpanFull(),
                ImageUploadConstraints::apply(
                    FileUpload::make('logo')
                        ->previewable(false)
                        ->fetchFileInformation(false)
                        ->disk('public')->visibility('public')->directory('profiles')
                        ->nullable(),
                    optional: true,
                ),
                ImageUploadConstraints::apply(
                    FileUpload::make('favicon')
                        ->previewable(false)
                        ->fetchFileInformation(false)
                        ->disk('public')->visibility('public')->directory('profiles')
                        ->nullable(),
                    optional: true,
                ),
            ]);
    }
}
