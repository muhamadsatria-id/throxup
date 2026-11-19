<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('shows the active modal banner on the home page', function () {
    $modal = \App\Models\ModalBanner::factory()->create([
        'title' => 'Pengumuman THORXup',
        'image' => 'modal-banners/test-banner.jpg',
        'link_url' => 'https://example.com',
        'is_active' => true,
    ]);

    Cache::forget('active_modal_banners');
    Cache::forget('active_modal_banner');

    $this->get('/')
        ->assertOk()
        ->assertSee('id="home-modal-banner"', false)
        ->assertSee('Pengumuman THORXup')
        ->assertSee($modal->link_url)
        ->assertSee(asset('storage/modal-banners/test-banner.jpg'), false);
});

it('does not show modal carousel buttons for a single active banner', function () {
    \App\Models\ModalBanner::factory()->create([
        'title' => 'Satu Banner',
        'image' => 'modal-banners/satu.jpg',
        'is_active' => true,
    ]);

    Cache::forget('active_modal_banners');

    $this->get('/')
        ->assertOk()
        ->assertSee('Satu Banner')
        ->assertDontSee('aria-label="Banner sebelumnya"', false)
        ->assertDontSee('aria-label="Banner berikutnya"', false);
});

it('shows modal carousel buttons for multiple active banners', function () {
    \App\Models\ModalBanner::factory()->create([
        'title' => 'Banner Pertama',
        'image' => 'modal-banners/pertama.jpg',
        'is_active' => true,
    ]);
    \App\Models\ModalBanner::factory()->create([
        'title' => 'Banner Kedua',
        'image' => 'modal-banners/kedua.jpg',
        'is_active' => true,
    ]);

    Cache::forget('active_modal_banners');

    $this->get('/')
        ->assertOk()
        ->assertSee('Banner Pertama')
        ->assertSee('Banner Kedua')
        ->assertSee('aria-label="Banner sebelumnya"', false)
        ->assertSee('aria-label="Banner berikutnya"', false);
});

it('uses Indonesian metadata and a single h1 on the home page', function () {
    \App\Models\HeroCarousel::create([
        'judul' => 'Komponen Alat Berat Siap Pakai',
        'deskripsi' => 'Suku cadang dan sistem hidrolik untuk alat berat.',
        'image' => 'hero/test.jpg',
        'is_active' => true,
        'order' => 1,
    ]);
    $category = \App\Models\Category::create([
        'nama' => 'Hydraulic Systems',
    ]);
    \App\Models\Product::create([
        'category_id' => $category->id,
        'nama' => 'Hydraulic Pump Assembly',
        'slug' => 'hydraulic-pump-assembly',
        'sku' => 'TH-HYD-TEST',
        'deskripsi' => 'Pompa hidrolik untuk excavator.',
        'benefits' => ['Aliran stabil', 'Diuji tekanan'],
        'detail_produk' => '<p>Pompa siap dipasang.</p>',
        'images' => ['products/test-pump.svg'],
        'is_active' => true,
    ]);

    Cache::forget('home_hero_carousels_v2');
    Cache::forget('home_featured_products_v2');
    Cache::forget('home_latest_news_v2');

    $this->get('/')
        ->assertOk()
        ->assertSee('<html lang="id"', false)
        ->assertSee('THORXup — Heavy Machinery &amp; Hydraulic Spare Parts', false)
        ->assertSee('rel="apple-touch-icon"', false);

    $html = $this->get('/')->getContent();
    expect(preg_match_all('/<h1\b/i', $html))->toBe(1);
});
