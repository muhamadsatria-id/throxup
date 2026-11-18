<?php

use App\Models\Category;
use App\Models\Product;

test('product catalog filters products by category slug', function () {
    $hydraulic = Category::create(['nama' => 'Hydraulic Assemblies']);
    $engine = Category::create(['nama' => 'Powertrain & Engines']);

    Product::create([
        'category_id' => $hydraulic->id,
        'nama' => 'HP-4200 Pump',
        'slug' => 'hp-4200-pump',
        'sku' => 'TX-HYD-4200',
        'deskripsi' => 'Pompa hidrolik tekanan tinggi.',
        'is_active' => true,
    ]);

    Product::create([
        'category_id' => $engine->id,
        'nama' => 'V8 Turbo Block',
        'slug' => 'v8-turbo-block',
        'sku' => 'TX-ENG-V8',
        'deskripsi' => 'Blok mesin diesel industri.',
        'is_active' => true,
    ]);

    $response = $this->get(route('product', ['category' => $hydraulic->slug]));

    $response->assertOk()
        ->assertSee('HP-4200 Pump')
        ->assertDontSee('V8 Turbo Block')
        ->assertSee(route('product', ['category' => $hydraulic->slug]), false);
});

test('category links use slugs and there is no dedicated category page', function () {
    $category = Category::create(['nama' => 'Undercarriage & Tracks']);

    Product::create([
        'category_id' => $category->id,
        'nama' => 'DuraTrack Master Link',
        'slug' => 'duratrack-master-link',
        'sku' => 'TX-UC-ML',
        'deskripsi' => 'Master link undercarriage.',
        'is_active' => true,
    ]);

    $this->get(route('product'))
        ->assertOk()
        ->assertSee(route('product', ['category' => $category->slug]), false)
        ->assertDontSee(route('product', ['category' => $category->id]), false);

    $this->get('/category/'.$category->slug)->assertNotFound();
});
