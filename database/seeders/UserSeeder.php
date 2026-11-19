<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Akun admin sesuai permintaan dan akun editor pendukung.
     */
    public function run(): void
    {
        foreach ([
            ['name' => 'muhamad satria', 'email' => 'admin@thorx.up'],
            ['name' => 'Editor THORXup', 'email' => 'editor@thorx.up'],
        ] as $attributes) {
            User::updateOrCreate(
                ['email' => $attributes['email']],
                [
                    'name' => $attributes['name'],
                    'password' => 'password123',
                    'email_verified_at' => now(),
                ],
            );
        }
    }
}
