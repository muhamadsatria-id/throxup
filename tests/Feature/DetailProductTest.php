<?php

use App\Models\Category;
use App\Models\Product;

test('detail product page renders product data from the database', function () {
    $category = Category::create(['nama' => 'Hydraulic Assemblies']);

    $product = Product::create([
        'category_id' => $category->id,
        'nama' => 'HP-4200 Axial Piston Pump',
        'sku' => 'TX-HYD-4200-AXP',
        'deskripsi' => 'Pompa hidrolik tekanan tinggi untuk excavator.',
        'benefits' => ['Efisiensi volumetrik tinggi'],
        'detail_produk' => '<p><strong>Tekanan Kerja:</strong> 350 Bar</p>',
        'images' => ['products/pump.jpg'],
        'is_active' => true,
    ]);

    $this->get(route('detail-product', $product->slug))
        ->assertOk()
        ->assertSee('HP-4200 Axial Piston Pump')
        ->assertSee('TX-HYD-4200-AXP')
        ->assertSee('Pompa hidrolik tekanan tinggi untuk excavator.')
        ->assertSee('Efisiensi volumetrik tinggi')
        ->assertSee('Tekanan Kerja')
        ->assertSee('350 Bar')
        ->assertSee(asset('storage/products/pump.jpg'));
});

test('detail product page returns not found for inactive products', function () {
    $category = Category::create(['nama' => 'Powertrain & Engines']);

    $product = Product::create([
        'category_id' => $category->id,
        'nama' => 'Draft Engine Block',
        'sku' => 'TX-ENG-DRAFT',
        'deskripsi' => 'Produk belum dipublikasikan.',
        'is_active' => false,
    ]);

    $this->get(route('detail-product', $product->slug))->assertNotFound();
});
