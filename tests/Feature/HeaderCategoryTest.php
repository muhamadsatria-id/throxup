<?php

use App\Models\Category;

test('header product menu shows at most seven categories plus all products link', function () {
    foreach (range(1, 9) as $number) {
        Category::create(['nama' => 'Category '.$number]);
    }

    $menuCategories = Category::menuList();

    expect($menuCategories)->toHaveCount(Category::MENU_LIMIT);

    $html = view('components.header', [
        'menuCategories' => $menuCategories->toArray(),
    ])->render();

    expect($html)
        ->toContain('All Products')
        ->toContain(route('product', ['category' => 'category-1']))
        ->toContain(route('product', ['category' => 'category-7']))
        ->not->toContain(route('product', ['category' => 'category-8']))
        ->not->toContain('Category 9');
});

test('header displays configured profile logo and fallback text', function () {
    \App\Models\Profile::create([
        'nama' => 'THORXup',
        'deskripsi' => 'Profil',
        'vision' => 'Visi',
        'mission' => [],
        'email' => 'hello@example.com',
        'phone' => '-',
        'whatsapp' => '-',
        'logo' => 'profiles/test-logo.png',
    ]);

    Cache::forget('site_profile');

    $html = view('components.header', [
        'profile' => new \Illuminate\Support\Fluent(
            \App\Models\Profile::first()->toArray()
        ),
        'menuCategories' => [],
    ])->render();

    expect($html)
        ->toContain(asset('storage/profiles/test-logo.png'))
        ->toContain('alt="THORXup"');

    \App\Models\Profile::first()->update(['logo' => null]);

    $html = view('components.header', [
        'profile' => new \Illuminate\Support\Fluent(
            \App\Models\Profile::first()->fresh()->toArray()
        ),
        'menuCategories' => [],
    ])->render();

    expect($html)
        ->toContain('THORX')
        ->toContain('up');
});
