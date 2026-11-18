<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\SeoService;

class PageController extends Controller
{
    public function show(Page $page)
    {
        abort_unless($page->is_active, 404);

        // Terapkan SEO otomatis dari Trait HasSeoMeta
        $page->applySeo();

        return view('pages.legal', compact('page'));
    }

    public function about(SeoService $seo)
    {
        $title = 'Tentang Kami — Mitra Solusi Pertambangan & Manufaktur';
        $description = 'Kenali THORXup, penyedia heavy machinery, hydraulic systems, powertrain, dan spare parts industri yang mendukung operasi pertambangan dan manufaktur di Indonesia.';

        $seo->apply([
            'title' => $title,
            'description' => $description,
            'canonical' => route('about'),
            'image' => $seo->defaultImage(),
            'og_type' => 'website',
            'schema' => $seo->aboutPageSchema($title, $description),
        ]);

        return view('pages.about');
    }
}
