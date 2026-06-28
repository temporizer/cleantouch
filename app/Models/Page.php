<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'meta_description', 'is_published'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function contents()
    {
        return $this->hasMany(PageContent::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereRaw(
            "to_tsvector('english', title || ' ' || coalesce(content, '')) @@ websearch_to_tsquery('english', ?)",
            [$search]
        );
    }

    protected static function booted()
    {
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }
}
