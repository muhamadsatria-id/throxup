<?php

namespace App\Filament\Resources\ModalBanners;

use App\Filament\RelationManagers\SeoMetaRelationManager;
use App\Filament\Resources\ModalBanners\Pages\CreateModalBanner;
use App\Filament\Resources\ModalBanners\Pages\EditModalBanner;
use App\Filament\Resources\ModalBanners\Pages\ListModalBanners;
use App\Filament\Resources\ModalBanners\Schemas\ModalBannerForm;
use App\Filament\Resources\ModalBanners\Tables\ModalBannersTable;
use App\Models\ModalBanner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ModalBannerResource extends Resource
{
    protected static ?string $model = ModalBanner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static ?string $navigationLabel = 'Modal Banner';

    protected static string|UnitEnum|null $navigationGroup = 'Tampilan';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ModalBannerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModalBannersTable::configure($table);
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
            'index' => ListModalBanners::route('/'),
            'create' => CreateModalBanner::route('/create'),
            'edit' => EditModalBanner::route('/{record}/edit'),
        ];
    }
}
