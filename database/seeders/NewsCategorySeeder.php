<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fatwa',
            'Kegiatan MUI',
            'Publikasi',
            'Ekonomi Syariah',
            'Pendidikan Islam',
            'Halal Lifestyle',
        ];

        foreach ($categories as $category) {
            NewsCategory::create([
                'tittle' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}