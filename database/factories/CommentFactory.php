<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        $comments = [
            'Terima kasih, artikelnya sangat informatif dan jelas.',
            'Sangat membantu, saya berhasil menerapkan langkah ini pada proyek saya.',
            'Ada beberapa bagian yang bisa diperdalam lagi, terutama tentang optimasi query.',
            'Bagus! Sangat membantu bagi pemula yang ingin belajar Laravel.',
            'Saya setuju, kontennya relevan dan mudah dipahami. Terima kasih!',
            'Apakah ada versi untuk SEO dan meta tag yang direkomendasikan?',
        ];

        return [
            'article_id' => Article::factory(),
            'name' => fake('id_ID')->name(),
            'email' => fake()->safeEmail(),
            'body' => $comments[array_rand($comments)],
            'approved' => fake()->boolean(60),
            'parent_id' => null,
        ];
    }
}
