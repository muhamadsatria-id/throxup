<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Platforms\Schemas\PlatformForm;
use App\Models\Platform;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManagePlatform extends Page
{
    protected string $view = 'filament.pages.manage-platform';

    protected static ?string $navigationLabel = 'Platform';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLink;

    public ?Platform $record = null;

    public ?array $data = [];

    public function mount(): void
    {
        $this->record = Platform::firstOrCreate([]);

        $this->form->fill($this->record->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return PlatformForm::configure($schema)
            ->model($this->record)
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);

        $this->form->fill($this->record->toArray());

        Notification::make()->title('Platform berhasil disimpan.')->success()->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan')
                ->action('save'),
        ];
    }
}
