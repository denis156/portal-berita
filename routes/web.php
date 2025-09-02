<?php

use App\Livewire\News\Index;
use App\Livewire\News\DetailNews;
use App\Livewire\News\ListNews;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('berita.beranda');
Route::get('/berita', ListNews::class)->name('berita.list');
Route::get('/kategori/{categorySlug}', ListNews::class)->name('berita.kategori');
Route::get('/berita/{slug}', DetailNews::class)->name('berita.detail');
