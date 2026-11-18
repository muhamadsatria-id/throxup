<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $query = News::query()
            ->whereNotNull('published_at')
            ->with('author');

        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder
                    ->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $news = $query
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $recentNews = News::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('pages.news', [
            'news' => $news,
            'recentNews' => $recentNews,
            'search' => $search,
        ]);
    }

    public function show(string $slug)
    {
        $news = News::query()
            ->where('slug', $slug)
            ->whereNotNull('published_at')
            ->with('author')
            ->firstOrFail();

        $recentNews = News::query()
            ->whereNotNull('published_at')
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $previousNews = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<', $news->published_at ?? $news->created_at)
            ->latest('published_at')
            ->first();

        $nextNews = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '>', $news->published_at ?? $news->created_at)
            ->oldest('published_at')
            ->first();

        $relatedNews = News::query()
            ->whereNotNull('published_at')
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
