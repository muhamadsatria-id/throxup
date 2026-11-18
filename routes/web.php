<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\ProductController;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
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
Route::get('/detail-product/{slug}', [ProductController::class, 'show'])->name('detail-product');
Route::get('/detail-news/{slug}', [NewsController::class, 'show'])->name('detail-news');

Route::get('/{page:slug}', [PageController::class, 'show'])->name('page');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
