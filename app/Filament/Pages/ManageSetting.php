<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Settings\Schemas\SettingForm;
use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageSetting extends Page
{
    protected string $view = 'filament.pages.manage-setting';

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    public ?Setting $record = null;

    public ?array $data = [];

    public function mount(): void
    {
        $this->record = Setting::firstOrCreate([]);
        $this->form->fill($this->record->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return SettingForm::configure($schema)
            ->model($this->record)
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);

        $this->form->fill($this->record->toArray());

        Notification::make()->title('Pengaturan berhasil disimpan.')->success()->send();
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
