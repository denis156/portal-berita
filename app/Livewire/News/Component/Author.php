<?php

namespace App\Livewire\News\Component;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Author extends Component
{
    public function render()
    {
        // Get top authors for "Kenali Ulama" section
        $topAuthors = DB::table('authors')
            ->leftJoin('news', 'authors.id', '=', 'news.author_id')
            ->select('authors.*', DB::raw('COUNT(news.id) as news_count'))
            ->groupBy('authors.id', 'authors.name', 'authors.username', 'authors.avatar', 'authors.bio', 'authors.created_at', 'authors.updated_at')
            ->orderBy('news_count', 'desc')
            ->limit(5)
            ->get();

        return view('livewire.news.component.author', [
            'topAuthors' => $topAuthors
        ]);
    }
}
