<?php

use App\Models\Page;

test('legal page renders rich editor formatting with prose styling', function () {
    $page = Page::create([
        'judul' => 'Rich Content Test',
        'slug' => 'rich-content-test',
        'konten' => '<h2>Judul Bagian</h2><p>Paragraf <strong>tebal</strong>.</p><ul><li>Item satu</li></ul><blockquote>Kutipan</blockquote>',
        'is_active' => true,
    ]);

    $this->get(route('page', $page))
        ->assertOk()
        ->assertSee('prose rich-content', false)
        ->assertSee('<h2', false)
        ->assertSee('<ul>', false)
        ->assertSee('<blockquote>', false)
        ->assertSee('Judul Bagian', false);
});

test('legal page sanitizes unsafe rich editor html', function () {
    $page = Page::create([
        'judul' => 'Unsafe Content Test',
        'slug' => 'unsafe-content-test',
        'konten' => '<p>Konten aman</p><script>alert(1)</script><img src=x onerror=alert(2)>',
        'is_active' => true,
    ]);

    $this->get(route('page', $page))
        ->assertOk()
        ->assertSee('Konten aman', false)
        ->assertDontSee('<script>alert(1)</script>', false)
        ->assertDontSee('onerror=alert(2)', false);
});

test('tailwind typography styles are compiled into the public stylesheet', function () {
    $stylesheets = glob(public_path('build/assets/*.css')) ?: [];

    expect($stylesheets)->not->toBeEmpty();

    $css = file_get_contents($stylesheets[0]);

    expect(str_contains($css, '.prose'))->toBeTrue()
        ->and(str_contains($css, '--tw-prose-body'))->toBeTrue();
});
