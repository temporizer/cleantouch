<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PortfolioItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'description', 'content', 'thumbnail',
        'images', 'category_id', 'is_published', 'published_at',
    ];

    protected $casts = [
        'images' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderByDesc('published_at');
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereRaw(
            "to_tsvector('english', title || ' ' || coalesce(description, '') || ' ' || coalesce(content, '')) @@ websearch_to_tsquery('english', ?)",
            [$search]
        );
    }

    protected static function booted()
    {
        static::creating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->title);
            }
        });

        static::updating(function ($item) {
            if ($item->is_published && !$item->wasChanged('is_published') && !$item->published_at) {
                $item->published_at = now();
            }
            if ($item->is_published && $item->wasChanged('is_published')) {
                $item->published_at = now();
            }
        });
    }
}
