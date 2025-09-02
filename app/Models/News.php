<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'author_id',
        'news_category_id',
        'tittle',
        'slug',
        'thumbnail',
        'content',
        'status',
        'is_feature',
        'view_count'
    ];

    protected $casts = [
        'is_feature' => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function banner()
    {
        return $this->hasOne(Banner::class);
    }
}
