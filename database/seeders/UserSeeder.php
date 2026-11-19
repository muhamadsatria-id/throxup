<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Akun admin & editor untuk Filament dan penulis berita dummy.
     */
    public function run(): void
    {
        foreach ([
            ['name' => 'Admin THORXup', 'email' => 'admin@throxup.test'],
            ['name' => 'Editor THORXup', 'email' => 'editor@throxup.test'],
        ] as $attributes) {
            User::firstOrCreate(
                ['email' => $attributes['email']],
                [
                    'name' => $attributes['name'],
                    'password' => 'password',
                    'email_verified_at' => now(),
                ],
            );
        }
    }
}
