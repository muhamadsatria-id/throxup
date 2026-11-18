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
