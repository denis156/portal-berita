<?php

namespace App\Livewire\News;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Footer extends Component
{
    public function render()
    {
        // Get categories for footer navigation
        $categories = DB::table('news_categories')
            ->select('id', 'tittle', 'slug')
            ->orderBy('tittle', 'desc')
            ->get();

        // Get current route info
        $currentRoute = request()->route()->getName();
        $currentParam = request()->route('categorySlug');

        return view('livewire.news.footer', [
            'categories' => $categories,
            'currentRoute' => $currentRoute,
            'currentParam' => $currentParam
        ]);
    }
}
