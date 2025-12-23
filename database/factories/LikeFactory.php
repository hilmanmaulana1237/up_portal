<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition(): array
    {
        return [
            'article_id' => Article::factory(),
            'visitor_token' => bin2hex(random_bytes(8)),
        ];
    }
}
