<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('admin can perform CRUD operations on articles', function () {
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    // Create
    $response = $this->post(route('admin.articles.store'), [
        'title' => 'Test Article',
        'excerpt' => 'Intro',
        'body' => 'Body',
        'status' => 'published',
        'published_at' => now()->toDateTimeString(),
        'cover_image' => UploadedFile::fake()->image('cover.jpg'),
    ]);
    $response->assertRedirect(route('admin.articles.index'));
    $article = Article::where('title', 'Test Article')->first();
    expect($article)->toBeInstanceOf(Article::class);

    // Edit
    $response = $this->put(route('admin.articles.update', $article), [
        'title' => 'Updated Title',
    ]);
    $response->assertRedirect(route('admin.articles.index'));
    $article->refresh();
    expect($article->title)->toBe('Updated Title');

    // Delete
    $response = $this->delete(route('admin.articles.destroy', $article));
    $response->assertRedirect(route('admin.articles.index'));
    expect(Article::find($article->id))->toBeNull();
});

test('public can submit comment and it is not approved by default', function () {
    $article = Article::factory()->create(['status' => 'published']);
    $response = $this->post(route('articles.comments.store', $article), [
        'name' => 'Visitor',
        'email' => 'visitor@example.com',
        'body' => 'Nice post',
    ]);
    $response->assertRedirect();
    $this->assertDatabaseHas('comments', ['article_id' => $article->id, 'approved' => false]);
});

test('likes cannot be double from same session', function () {
    $article = Article::factory()->create(['status' => 'published']);

    $this->post(route('articles.like', $article));
    expect(Like::count())->toBe(1);
    $resp = $this->post(route('articles.like', $article));
    $resp->assertStatus(422);
    expect(Like::count())->toBe(1);
});
