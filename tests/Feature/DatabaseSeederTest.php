<?php

use App\Models\Category;
use App\Models\HeroCarousel;
use App\Models\ModalBanner;
use App\Models\News;
use App\Models\Page;
use App\Models\Platform;
use App\Models\Product;
use App\Models\Profile;
use App\Models\QuoteRequest;
use App\Models\SeoMeta;
use App\Models\Setting;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Storage;

test('database seeder populates public content with local placeholder images', function () {
    Storage::fake('public');

    $this->seed(DatabaseSeeder::class);

    expect(User::where('email', 'admin@throxup.test')->exists())->toBeTrue()
        ->and(Profile::count())->toBe(1)
        ->and(Platform::count())->toBe(1)
        ->and(Setting::count())->toBe(1)
        ->and(Category::count())->toBe(8)
        ->and(Product::count())->toBe(12)
        ->and(News::count())->toBe(6)
        ->and(Page::count())->toBe(4)
        ->and(HeroCarousel::count())->toBe(3)
        ->and(ModalBanner::count())->toBe(1)
        ->and(QuoteRequest::count())->toBe(3)
        ->and(SeoMeta::count())->toBeGreaterThan(30);

    $hero = HeroCarousel::query()->orderBy('order')->firstOrFail();
    $svg = Storage::disk('public')->get($hero->image);
    expect($hero->image)->toStartWith('hero-carousels/')
        ->and(Storage::disk('public')->exists($hero->image))->toBeTrue()
        ->and(str_contains($svg, '<svg'))->toBeTrue()
        ->and(str_contains($svg, '<circle'))->toBeTrue()
        ->and(str_contains($svg, 'implode('))->toBeFalse();

    $product = Product::query()->firstOrFail();
    expect($product->images)->not->toBeEmpty()
        ->and($product->images[0])->toStartWith('products/')
        ->and(Storage::disk('public')->exists($product->images[0]))->toBeTrue();

    $article = News::query()->firstOrFail();
    expect($article->thumbnail)->toStartWith('news/')
        ->and(Storage::disk('public')->exists($article->thumbnail))->toBeTrue();

    $profile = Profile::query()->firstOrFail();
    expect($profile->logo)->toStartWith('profiles/')
        ->and(Storage::disk('public')->exists($profile->logo))->toBeTrue();

    expect(Storage::disk('public')->exists(ModalBanner::query()->firstOrFail()->image))->toBeTrue()
        ->and(Storage::disk('public')->exists(Category::query()->firstOrFail()->image))->toBeTrue();
});

test('seeded public content is publishable and image paths stay relative', function () {
    Storage::fake('public');

    $this->seed(DatabaseSeeder::class);

    expect(Product::query()->where('is_active', false)->count())->toBe(0)
        ->and(Page::query()->where('is_active', false)->count())->toBe(0)
        ->and(HeroCarousel::query()->where('is_active', false)->count())->toBe(0)
        ->and(News::query()->whereNull('published_at')->count())->toBe(0)
        ->and(News::query()->where('published_at', '>', now())->count())->toBe(0);

    foreach (Product::query()->pluck('images') as $images) {
        foreach ($images as $image) {
            expect(str_starts_with($image, 'http'))->toBeFalse()
                ->and(Storage::disk('public')->exists($image))->toBeTrue();
        }
    }
});

test('database seeder is safe to run more than once', function () {
    Storage::fake('public');

    $this->seed(DatabaseSeeder::class);

    $before = [
        'users' => User::count(),
        'categories' => Category::count(),
        'products' => Product::count(),
        'news' => News::count(),
        'pages' => Page::count(),
        'heroes' => HeroCarousel::count(),
        'quotes' => QuoteRequest::count(),
    ];

    $this->seed(DatabaseSeeder::class);

    expect(User::count())->toBe($before['users'])
        ->and(Category::count())->toBe($before['categories'])
        ->and(Product::count())->toBe($before['products'])
        ->and(News::count())->toBe($before['news'])
        ->and(Page::count())->toBe($before['pages'])
        ->and(HeroCarousel::count())->toBe($before['heroes'])
        ->and(QuoteRequest::count())->toBe($before['quotes']);
});
