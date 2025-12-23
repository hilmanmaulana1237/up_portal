<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'cover_image',
        'status',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->where('approved', true)->latest();
    }

    public function allComments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->whereNotNull('published_at')->orderByDesc('published_at');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function generateSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;
        $maxAttempts = 1000;

        while (self::where('slug', $slug)->exists()) {
            if ($i > $maxAttempts) {
                // fallback to random suffix if something odd is happening
                $slug = $base . '-' . Str::random(6);
                break;
            }
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
