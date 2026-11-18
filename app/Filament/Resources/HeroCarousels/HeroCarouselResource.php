<?php

namespace App\Filament\Resources\HeroCarousels;

use App\Filament\RelationManagers\SeoMetaRelationManager;
use App\Filament\Resources\HeroCarousels\Pages\CreateHeroCarousel;
use App\Filament\Resources\HeroCarousels\Pages\EditHeroCarousel;
use App\Filament\Resources\HeroCarousels\Pages\ListHeroCarousels;
use App\Filament\Resources\HeroCarousels\Schemas\HeroCarouselForm;
use App\Filament\Resources\HeroCarousels\Tables\HeroCarouselsTable;
use App\Models\HeroCarousel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HeroCarouselResource extends Resource
{
    protected static ?string $model = HeroCarousel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Hero Carousel';

    protected static string|UnitEnum|null $navigationGroup = 'Tampilan';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return HeroCarouselForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroCarouselsTable::configure($table);
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
            'index' => ListHeroCarousels::route('/'),
            'create' => CreateHeroCarousel::route('/create'),
            'edit' => EditHeroCarousel::route('/{record}/edit'),
        ];
    }
}
