<?php

namespace App\Livewire\News;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

#[Title('Daftar Berita')]
#[Layout('components.layouts.news')]
class ListNews extends Component
{
    use WithPagination;

    public $categorySlug = '';
    public $search = '';
    public $category = '';
    public $sortBy = 'latest';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'latest']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($categorySlug = null)
    {
        $this->categorySlug = $categorySlug;
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Get current category if slug provided
        $currentCategory = null;
        if ($this->categorySlug) {
            $currentCategory = DB::table('news_categories')
                ->where('slug', $this->categorySlug)
                ->first();
            
            if (!$currentCategory) {
                abort(404, 'Kategori tidak ditemukan');
            }
        }

        // Build query
        $query = DB::table('news')
            ->join('authors', 'news.author_id', '=', 'authors.id')
            ->join('news_categories', 'news.news_category_id', '=', 'news_categories.id')
            ->select([
                'news.id',
                'news.tittle',
                'news.slug',
                'news.thumbnail',
                'news.content',
                'news.created_at',
                'news.view_count',
                'authors.name as author_name',
                'news_categories.tittle as category_name'
            ])
            ->where('news.status', 'publish');

        // Apply category filter from URL slug
        if ($currentCategory) {
            $query->where('news.news_category_id', $currentCategory->id);
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('news.tittle', 'like', '%' . $this->search . '%')
                  ->orWhere('news.content', 'like', '%' . $this->search . '%')
                  ->orWhere('authors.name', 'like', '%' . $this->search . '%');
            });
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'popular':
                $query->orderBy('news.view_count', 'desc');
                break;
            case 'oldest':
                $query->orderBy('news.created_at', 'asc');
                break;
            case 'latest':
            default:
                $query->orderBy('news.created_at', 'desc');
                break;
        }

        $news = $query->paginate(12);

        // Update title dynamically
        $pageTitle = $currentCategory ? 'Berita ' . $currentCategory->tittle : 'Semua Berita';

        return view('livewire.news.list-news', [
            'news' => $news,
            'currentCategory' => $currentCategory
        ]);
    }
}
