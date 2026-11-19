<?php

namespace App\Filament\Resources\Pages;

use App\Filament\RelationManagers\SeoMetaRelationManager;
use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Filament\Resources\Pages\Pages\ListPages;
use App\Filament\Resources\Pages\Schemas\PageForm;
use App\Filament\Resources\Pages\Tables\PagesTable;
use App\Models\Page;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $navigationLabel = 'Halaman';

    protected static string|UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $recordTitleAttribute = 'judul';

    protected static bool $shouldRegisterNavigation = false;

    // Lempar ke 404 HANYA jika user mengakses URL milik resource Pages
    public static function canViewAny(): bool
    {
        if (request()->routeIs('filament.*.resources.pages.*')) {
            abort(404);
        }

        return false;
    }
    
    public static function form(Schema $schema): Schema
    {
        return PageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            SeoMetaRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
}
