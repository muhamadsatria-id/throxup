<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('ga4_code')
                    ->label('Google Analytics 4')
                    ->nullable()->helperText('(opsional)')
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('gtm_head_code')
                    ->label('Google Tag Manager (head)')
                    ->nullable()->helperText('(opsional)')
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('gtm_body_code')
                    ->label('Google Tag Manager (body)')
                    ->nullable()->helperText('(opsional)')
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('gsc_verification')
                    ->label('Google Search Console')
                    ->nullable()->helperText('(opsional)')
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('custom_head_scripts')
                    ->label('Script Custom (head)')
                    ->nullable()->helperText('(opsional)')
                    ->rows(6)
                    ->columnSpanFull(),
                Textarea::make('custom_body_scripts')
                    ->label('Script Custom (body)')
                    ->nullable()->helperText('(opsional)')
                    ->rows(6)
                    ->columnSpanFull(),
            ]);
    }
}
