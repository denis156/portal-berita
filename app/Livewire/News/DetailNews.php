<?php

namespace App\Livewire\News;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

#[Title('Detail Berita')]
#[Layout('components.layouts.news')]
class DetailNews extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        // Get main news detail
        $news = DB::table('news')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select([
                'news.*',
                'authors.name as author_name',
                'authors.bio as author_bio',
                'authors.avatar as author_avatar',
                'news_categories.tittle as category_name'
            ])
            ->where('news.slug', $this->slug)
            ->where('news.status', 'publish')
            ->first();

        if (!$news) {
            abort(404);
        }

        // Update view count
        DB::table('news')
            ->where('id', $news->id)
            ->increment('view_count');

        // Get related news from same category (exclude current news)
        $relatedNews = DB::table('news')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select([
                'news.id',
                'news.tittle',
                'news.slug',
                'news.thumbnail',
                'news.created_at',
                'authors.name as author_name',
                'news_categories.tittle as category_name'
            ])
            ->where('news.news_category_id', $news->news_category_id)
            ->where('news.id', '!=', $news->id)
            ->where('news.status', 'publish')
            ->orderBy('news.created_at', 'desc')
            ->limit(4)
            ->get();

        return view('livewire.news.detail-news', [
            'news' => $news,
            'relatedNews' => $relatedNews
        ]);
    }
}
