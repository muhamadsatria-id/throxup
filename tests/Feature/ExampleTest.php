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
