<?php
use App\Models\News;
use App\Models\User;

test('temp detail news3 renders', function () {
    $user = User::factory()->create();
    $news = News::factory()->create([
        'user_id' => $user->id,
        'judul' => 'Berita Uji 3',
        'slug' => 'berita-uji-3',
        'deskripsi' => '<p>Isi uji</p>',
        'published_at' => now(),
    ]);
    $response = $this->get('/detail-news/berita-uji-3');
    $response->assertOk();
    $news->delete();
});
