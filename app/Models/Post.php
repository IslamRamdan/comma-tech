<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    protected $casts = [
        'gallery_images' => 'array',
        'published_at'   => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** المقالات المنشورة فقط (وتاريخ نشرها وصل) */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(fn($w) => $w->whereNull('published_at')->orWhere('published_at', '<=', now()));
    }

    /** رابط الصورة: يدعم رابط كامل أو مسار داخل storage */
    public function getImageUrlAttribute(): ?string
    {
        $img = $this->featured_image;
        if (! $img) return null;

        return Str::startsWith($img, ['http://', 'https://', '/'])
            ? $img
            : asset('storage/' . $img);
    }

    /** روابط صور المعرض */
    public function getGalleryUrlsAttribute(): array
    {
        return collect($this->gallery_images ?? [])
            ->filter()
            ->map(fn($img) => Str::startsWith($img, ['http://', 'https://', '/'])
                ? $img
                : asset('storage/' . $img))
            ->values()
            ->all();
    }

    public function getExcerptAttribute(): string
    {
        return $this->summary
            ?: Str::limit(trim(strip_tags($this->content)), 150);
    }

    public function getReadingTimeAttribute(): int
    {
        $words = str_word_count(strip_tags($this->content)) ?: Str::length(strip_tags($this->content)) / 6;
        return max(1, (int) ceil($words / 180));
    }
}
