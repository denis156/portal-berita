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

        User::factory()->create([
            'name' => 'Denis Djodian Ardika',
            'email' => 'dev@dev.id',
        ]);

        // Call all seeders in the correct order
        $this->call([
            AuthorSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
