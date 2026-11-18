<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\SeoService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request, SeoService $seo)
    {
        $search = trim((string) $request->query('q', ''));

        $query = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('author');

        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder
                    ->where('judul', 'like', '%'.$search.'%')
                    ->orWhere('deskripsi', 'like', '%'.$search.'%');
            });
        }

        $news = $query
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $recentNews = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(5)
            ->get();

        $canonical = $search !== ''
            ? route('news')
            : $request->fullUrlWithoutQuery(['q']);

        $pageTitle = $search !== ''
            ? 'Hasil pencarian "'.$search.'"'
            : 'Berita & Wawasan Industri Alat Berat';

        $description = $search !== ''
            ? 'Hasil pencarian berita THORXup untuk "'.$search.'". Baca laporan teknis, panduan perawatan, dan inovasi industri alat berat.'
            : 'Baca berita industri, laporan teknis, panduan perawatan lapangan, dan inovasi sistem hidrolik alat berat dari para ahli THORXup.';

        $seo->apply([
            'title' => $pageTitle,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => $search !== '' ? 'noindex, follow' : 'index, follow',
            'image' => $news->first()?->thumbnail,
            'og_type' => 'website',
            'schema' => $seo->itemListSchema(
                'Berita & Wawasan Industri THORXup',
                $news->getCollection()
                    ->map(fn (News $article) => [
                        'name' => $article->judul,
                        'url' => route('detail-news', $article->slug),
                    ])
                    ->all(),
                $canonical,
            ),
        ]);

        return view('pages.news', [
            'news' => $news,
            'recentNews' => $recentNews,
            'search' => $search,
        ]);
    }

    public function show(string $slug, SeoService $seo)
    {
        $news = News::query()
            ->where('slug', $slug)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with(['author', 'seoMeta'])
            ->firstOrFail();

        $news->applySeo();

        $recentNews = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $previousNews = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('published_at', '<', $news->published_at ?? $news->created_at)
            ->latest('published_at')
            ->first();

        $nextNews = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('published_at', '>', $news->published_at ?? $news->created_at)
            ->oldest('published_at')
            ->first();

        $relatedNews = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('pages.detail-news', [
            'news' => $news,
            'recentNews' => $recentNews,
            'previousNews' => $previousNews,
            'nextNews' => $nextNews,
            'relatedNews' => $relatedNews,
        ]);
    }
}
