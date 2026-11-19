<?php

namespace App\Filament\Resources\SeoMetas\Schemas;

use App\Models\Category;
use App\Models\HeroCarousel;
use App\Models\ModalBanner;
use App\Models\News;
use App\Models\Page;
use App\Models\Platform;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\MorphToSelect\Type;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SeoMetaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                MorphToSelect::make('seoable')
                    ->label('Model Terkait')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->types([
                        Type::make(Product::class)->label('Produk')->titleAttribute('nama'),
                        Type::make(Category::class)->label('Kategori')->titleAttribute('nama'),
                        Type::make(News::class)->label('Berita')->titleAttribute('judul'),
                        Type::make(Page::class)->label('Halaman')->titleAttribute('judul'),
                        Type::make(Profile::class)->label('Profil')->titleAttribute('nama'),
                        Type::make(Platform::class)->label('Platform')->titleAttribute('id'),
                        Type::make(HeroCarousel::class)->label('Hero Carousel')->titleAttribute('judul'),
                        Type::make(ModalBanner::class)->label('Modal Banner')->titleAttribute('title'),
                        Type::make(Setting::class)->label('Setting')->titleAttribute('id'),
                    ]),
                TextInput::make('title')
                    ->label('Meta Title')
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(70)
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->label('Meta Description')
                    ->nullable()->helperText('(opsional)')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('keyword')
                    ->label('Meta Keywords')
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('canonical_url')
                    ->label('Canonical URL')
                    ->url()
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Select::make('robots')
                    ->options([
                        'index, follow' => 'index, follow',
                        'noindex, nofollow' => 'noindex, nofollow',
                    ])
                    ->default('index, follow')
                    ->required(),
                FileUpload::make('og_image')
                    ->label('OG Image')
                    ->image()
                    ->disk('public')->visibility('public')->directory('seo')
                    ->nullable()->helperText('(opsional)'),
                KeyValue::make('schema_json')
                    ->label('Schema JSON-LD')
                    ->nullable()->helperText('(opsional)')
                    ->keyLabel('Properti')
                    ->valueLabel('Nilai')
                    ->columnSpanFull(),
                Toggle::make('is_manual')
                    ->label('Diisi Manual')
                    ->default(false),
            ]);
    }
}
