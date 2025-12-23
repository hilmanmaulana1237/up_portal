<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // In local development, wipe tables to avoid duplicate seeding and slug collisions
        if (app()->environment('local')) {
            // Schema::disableForeignKeyConstraints();
            // Article::truncate();
            // Comment::truncate();
            // Like::truncate();
            // Schema::enableForeignKeyConstraints();
            
            // Note: Since we use migrate:fresh, the tables are already empty. 
            // We can skip manual truncation to be safe on SQLite.
        }
        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // Create a few authors and articles
        $articles = Article::factory()->count(5)->create(['status' => 'published']);
        Article::factory()->count(2)->create(['status' => 'draft']);

        // Create comments; some approved, some not
        Comment::factory()->count(10)->create();

        // Create likes for some published articles
        foreach ($articles as $article) {
            Like::factory()->count(rand(1, 5))->create(['article_id' => $article->id]);
        }
    }
}
