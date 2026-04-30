<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // for local env only
        if (app()->environment('local')) {
            User::firstOrCreate(
                ['email' => 'admin@admin.com'],
                [
                    'name' => 'Admin',
                    'password' => bcrypt('asdfasdf'),
                    'is_admin' => true,
                    'email_verified_at' => now(),
                ]
            );
        }

        $this->call(CategorySeeder::class);
    }
}
