<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\ProfileController;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PageController;


Route::get('/{page:slug}', [PageController::class, 'show'])->name('page');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/product', function () {
    return view('pages.product');
})->name('product');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function (Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'full_name' => ['required', 'string', 'max:255'],
        'business_email' => ['required', 'email', 'max:255'],
        'phone_number' => ['nullable', 'string', 'max:50'],
        'subject' => ['nullable', 'string', 'max:255'],
        'project_specifications' => ['required', 'string'],
    ]);

    QuoteRequest::create($validated + ['status' => 'pending']);

    $message = 'Permintaan penawaran berhasil dikirim. Tim kami akan segera menghubungi Anda.';

    if ($request->expectsJson()) {
        return response()->json(['message' => $message]);
    }

    return redirect()->route('home')->with('quote_status', $message);
})->name('quote.store');
Route::get('/detail-product/{slug}', function ($slug) {
    return view('pages.detail-product', ['slug' => $slug]);
})->name('detail-product');
Route::get('/category/{slug}', function ($slug) {
    return view('pages.category', ['slug' => $slug]);
})->name('category');
Route::get('/detail-news/{slug}', [NewsController::class, 'show'])->name('detail-news');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});