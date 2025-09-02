<?php

namespace App\Livewire\News;

use App\Models\NewsCategory;
use Livewire\Component;

class Nav extends Component
{
    public function render()
    {
        $categories = NewsCategory::orderBy('tittle', 'desc')->get();
        
        // Get current route info
        $currentRoute = request()->route()->getName();
        $currentParam = request()->route('categorySlug');
        
        return view('livewire.news.nav', compact('categories', 'currentRoute', 'currentParam'));
    }
}
