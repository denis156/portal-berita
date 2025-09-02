<?php

namespace App\Livewire\News\Component;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Banner extends Component
{
    public function render()
    {
        // Get banner news from database
        $bannerNews = DB::table('banners')
            ->join('news', 'banners.news_id', '=', 'news.id')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select(
                'news.*',
                'authors.name as author_name',
                'news_categories.tittle as category_name',
                'banners.created_at as banner_created_at'
            )
            ->where('news.status', 'publish')
            ->orderBy('banners.created_at', 'desc')
            ->limit(4)
            ->get();

        return view('livewire.news.component.banner', [
            'bannerNews' => $bannerNews
        ]);
    }
}
