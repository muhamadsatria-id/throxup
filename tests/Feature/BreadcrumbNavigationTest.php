<?php

use Illuminate\Support\Facades\Blade;

test('breadcrumb renders home, links and the active page', function () {
    $html = view('components.breadcrumb-navigation', [
        'items' => [
            ['label' => 'Products', 'url' => route('product')],
            ['label' => 'Detail Produk'],
        ],
    ])->render();

    expect($html)
        ->toContain('aria-label="Breadcrumb"')
        ->toContain('href="'.route('home').'"')
        ->toContain('href="'.route('product').'"')
        ->toContain('Detail Produk')
        ->toContain('aria-current="page"')
        ->toContain('"@type":"BreadcrumbList"');
});

test('breadcrumb supports centered alignment and custom classes as attributes', function () {
    $html = Blade::render(
        '<x-breadcrumb-navigation align="center" class="mb-space-md" :items="$items" />',
        ['items' => [['label' => 'Tentang Kami']]]
    );

    expect($html)
        ->toContain('justify-center')
        ->toContain('mb-space-md');
});

test('breadcrumb can hide intermediate items on mobile', function () {
    $html = view('components.breadcrumb-navigation', [
        'items' => [
            ['label' => 'News & Insights', 'url' => route('news'), 'hide_on_mobile' => true],
            ['label' => 'Detail Berita'],
        ],
    ])->render();

    expect($html)
        ->toContain('hidden sm:inline')
        ->not->toContain('<span aria-hidden="true" class="">/</span>');
});

test('breadcrumb always renders the home crumb even without items', function () {
    $html = view('components.breadcrumb-navigation')->render();

    expect($html)
        ->toContain('aria-current="page"')
        ->toContain(route('home'));
});

test('public pages render the breadcrumb component', function () {
    $this->get(route('product'))
        ->assertOk()
        ->assertSee('aria-label="Breadcrumb"', false)
        ->assertSee('Katalog Produk');

    $this->get(route('news'))
        ->assertOk()
        ->assertSee('aria-label="Breadcrumb"', false)
        ->assertSee('Berita & Wawasan');

    $this->get(route('about'))
        ->assertOk()
        ->assertSee('aria-label="Breadcrumb"', false)
        ->assertSee('Tentang Kami');
});
