<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\News;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil beberapa berita untuk dijadikan banner
        $featuredNews = News::whereIn('tittle', [
            'MUI Keluarkan Fatwa Tentang Penggunaan AI dalam Ibadah',
            'Rakernas MUI 2024: Strategi Dakwah Digital Era 5.0',
            'Launching Aplikasi Halal Check untuk Kemudahan Konsumen Muslim',
            'Perkembangan Ekonomi Syariah Indonesia Mencapai Rekor Tertinggi',
            'Program Beasiswa Tahfidz Quran untuk 10.000 Santri Indonesia',
        ])->get();

        foreach ($featuredNews as $news) {
            Banner::create([
                'news_id' => $news->id,
            ]);
        }
    }
}