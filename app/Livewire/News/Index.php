<?php

namespace App\Livewire\News;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;

#[Title('Beranda')]
#[Layout('components.layouts.news')]
class Index extends Component
{
    public function render()
    {
        // Get featured news for "Berita Unggulan" section
        $featuredNews = DB::table('news')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select('news.*', 'authors.name as author_name', 'news_categories.tittle as category_name')
            ->where('news.status', 'publish')
            ->where('news.is_feature', true)
            ->orderBy('news.created_at', 'desc')
            ->limit(4)
            ->get();

        // Get latest news for "Berita Terbaru" section (main news)
        $latestMainNews = DB::table('news')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select('news.*', 'authors.name as author_name', 'news_categories.tittle as category_name')
            ->where('news.status', 'publish')
            ->orderBy('news.created_at', 'desc')
            ->first();

        // Get side news for "Berita Terbaru" section (excluding main news)
        $latestSideNews = DB::table('news')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select('news.*', 'authors.name as author_name', 'news_categories.tittle as category_name')
            ->where('news.status', 'publish')
            ->where('news.id', '!=', $latestMainNews->id ?? 0)
            ->orderBy('news.created_at', 'desc')
            ->limit(3)
            ->get();


        // Get editor's choice news for "Pilihan Ulama" section
        $editorsChoice = DB::table('news')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select('news.*', 'authors.name as author_name', 'news_categories.tittle as category_name')
            ->where('news.status', 'publish')
            ->whereIn('news_categories.tittle', ['Fatwa', 'Kajian Islam', 'Pendidikan Islam', 'Halal Lifestyle'])
            ->orderBy('news.updated_at', 'desc')
            ->limit(4)
            ->get();

        return view('livewire.news.index', [
            'featuredNews' => $featuredNews,
            'latestMainNews' => $latestMainNews,
            'latestSideNews' => $latestSideNews,
            'editorsChoice' => $editorsChoice,
        ]);
    }
}
