<?php

use App\Models\Profile;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Storage;

test('about page renders vision and mission from seeded profile', function () {
    Storage::fake('public');

    $this->seed(DatabaseSeeder::class);

    $profile = Profile::query()->firstOrFail();

    $this->get('/about')
        ->assertOk()
        ->assertSee($profile->vision, false)
        ->assertSee($profile->mission[0], false)
        ->assertSee('Durability - Performance - Reliability - Expertise', false);
});
