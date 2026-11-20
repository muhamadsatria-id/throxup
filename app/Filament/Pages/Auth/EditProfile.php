<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Schemas\Components\Component;

class EditProfile extends BaseEditProfile
{
    public static function getLabel(): string
    {
        return 'Profil Saya';
    }

    protected function getNameFormComponent(): Component
    {
        return parent::getNameFormComponent()->label('Nama');
    }

    protected function getEmailFormComponent(): Component
    {
        return parent::getEmailFormComponent()->label('Email');
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()->label('Password Baru');
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return parent::getPasswordConfirmationFormComponent()->label('Konfirmasi Password Baru');
    }

    protected function getCurrentPasswordFormComponent(): Component
    {
        return parent::getCurrentPasswordFormComponent()
            ->label('Password Saat Ini')
            ->belowContent('Masukkan password saat ini untuk mengubah email atau password.');
    }
}
