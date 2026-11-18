<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function show(Page $page)
    {
        abort_unless($page->is_active, 404);

        // Terapkan SEO otomatis dari Trait HasSeoMeta
        if (method_exists($page, 'applySeo')) {
            $page->applySeo();
        }

        return view('pages.legal', compact('page'));
    }
}