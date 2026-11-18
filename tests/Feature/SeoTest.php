<?php

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\User;

test('home page exposes complete seo metadata and structured data', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('<title>THORXup — Heavy Machinery, Hydraulic Systems & Spare Parts</title>', false)
        ->assertSee('<meta name="description"', false)
        ->assertSee('<link rel="canonical" href="'.route('home').'">', false)
        ->assertSee('<meta property="og:type" content="website">', false)
        ->assertSee('<meta name="twitter:card" content="summary_large_image">', false)
        ->assertSee('"@type":"WebSite"', false)
        ->assertSee('"@type":"Organization"', false);
});

test('product detail page emits product structured data and canonical url', function () {
    $category = Category::create(['nama' => 'Hydraulic Assemblies']);

    $product = Product::create([
        'category_id' => $category->id,
        'nama' => 'HP-4200 Axial Piston Pump',
        'sku' => 'TX-HYD-4200-AXP',
        'deskripsi' => 'Pompa hidrolik tekanan tinggi untuk excavator.',
        'images' => ['products/pump.jpg'],
        'is_active' => true,
    ]);

    $response = $this->get(route('detail-product', $product->slug));

    $response->assertOk()
        ->assertSee('<link rel="canonical" href="'.route('detail-product', $product->slug).'">', false)
        ->assertSee('<meta property="og:type" content="product">', false)
        ->assertSee('"@type":"Product"', false)
        ->assertSee('"@type":"BreadcrumbList"', false)
        ->assertSee('"sku":"TX-HYD-4200-AXP"', false);
});

test('news detail page emits article metadata and news article schema', function () {
    $user = User::factory()->create();

    $news = News::create([
        'user_id' => $user->id,
        'judul' => 'Panduan Perawatan Hidrolik Alat Berat',
        'slug' => 'panduan-perawatan-hidrolik-alat-berat',
        'deskripsi' => '<p>Langkah perawatan sistem hidrolik agar tetap andal.</p>',
        'published_at' => now()->subDay(),
    ]);

    $response = $this->get(route('detail-news', $news->slug));

    $response->assertOk()
        ->assertSee('<link rel="canonical" href="'.route('detail-news', $news->slug).'">', false)
        ->assertSee('<meta property="og:type" content="article">', false)
        ->assertSee('article:published_time', false)
        ->assertSee('"@type":"NewsArticle"', false)
        ->assertSee('"headline":"Panduan Perawatan Hidrolik Alat Berat"', false);
});

test('search result pages are noindex and canonical to the clean listing url', function () {
    $this->get(route('product', ['q' => 'pump']))
        ->assertOk()
        ->assertSee('<meta name="robots" content="noindex, follow">', false)
        ->assertSee('<link rel="canonical" href="'.route('product').'">', false);

    $this->get(route('news', ['q' => 'hidrolik']))
        ->assertOk()
        ->assertSee('<meta name="robots" content="noindex, follow">', false)
        ->assertSee('<link rel="canonical" href="'.route('news').'">', false);
});

test('sitemap and robots txt expose public urls', function () {
    $category = Category::create(['nama' => 'Powertrain & Engines']);

    $product = Product::create([
        'category_id' => $category->id,
        'nama' => 'Turbo Diesel Engine',
        'sku' => 'TX-ENG-001',
        'deskripsi' => 'Mesin diesel industri.',
        'is_active' => true,
    ]);

    $user = User::factory()->create();

    $news = News::create([
        'user_id' => $user->id,
        'judul' => 'Berita Industri',
        'slug' => 'berita-industri',
        'deskripsi' => '<p>Ringkasan berita.</p>',
        'published_at' => now(),
    ]);

    $this->get(route('sitemap'))
        ->assertOk()
        ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
        ->assertSee(route('detail-product', $product->slug), false)
        ->assertSee(route('detail-news', $news->slug), false);

    $this->get(route('robots'))
        ->assertOk()
        ->assertSee('Sitemap: '.route('sitemap'), false)
        ->assertSee('Disallow: /admin', false);
});

test('inactive pages are noindex through the 404 fallback', function () {
    $this->get('/halaman-yang-tidak-ada')
        ->assertNotFound()
        ->assertSee('<meta name="robots" content="noindex, nofollow">', false);
});
