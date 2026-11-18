<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Profiles\Schemas\ProfileForm;
use App\Models\Profile;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageProfile extends Page
{
    protected string $view = 'filament.pages.manage-profile';

    protected static ?string $navigationLabel = 'Profil';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    public ?Profile $record = null;

    public ?array $data = [];

    public function mount(): void
    {
        $this->record = Profile::first() ?? Profile::create([
            'nama' => 'THORXup',
            'deskripsi' => 'Profil perusahaan',
            'vision' => 'Visi perusahaan',
            'mission' => [],
            'email' => 'halo@thorxup.test',
            'phone' => '-',
            'whatsapp' => '-',
        ]);

        $this->form->fill($this->record->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return ProfileForm::configure($schema)
            ->model($this->record)
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);

        $this->form->fill($this->record->toArray());

        Notification::make()->title('Profil berhasil disimpan.')->success()->send();
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
