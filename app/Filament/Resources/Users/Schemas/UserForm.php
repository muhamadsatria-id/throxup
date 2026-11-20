<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Hidden::make('email_verified_at')
                    ->default(fn () => now())
                    ->dehydrateStateUsing(fn ($state) => $state ?? now()),
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->rule(Password::default())
                    ->same('passwordConfirmation')
                    ->live(debounce: 500)
                    ->autocomplete('new-password')
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->helperText('Kosongkan untuk mempertahankan password lama.'),
                TextInput::make('passwordConfirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->revealable()
                    ->required(fn (Get $get): bool => filled($get('password')))
                    ->visible(fn (Get $get): bool => filled($get('password')))
                    ->autocomplete('new-password')
                    ->dehydrated(false),
            ]);
    }
}
