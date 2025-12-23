<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        abort_if(auth()->user()->role !== 'admin', 403);
        $this->authorize('viewAny', Article::class);

        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        abort_if(auth()->user()->role !== 'admin', 403);
        $this->authorize('create', Article::class);
        return view('admin.articles.create');
    }

    public function store(StoreArticleRequest $request)
    {
        abort_if(auth()->user()->role !== 'admin', 403);
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = Article::generateSlug($data['title']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $article = Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article created');
    }

    public function edit(Article $article)
    {
        abort_if(auth()->user()->role !== 'admin' && auth()->user()->id !== $article->user_id, 403);
        $this->authorize('update', $article);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        abort_if(auth()->user()->role !== 'admin' && auth()->user()->id !== $article->user_id, 403);
        $this->authorize('update', $article);
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            // delete old if exists
            if ($article->cover_image) {
                Storage::disk('public')->delete($article->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        if (isset($data['title']) && $data['title'] !== $article->title) {
            $data['slug'] = Article::generateSlug($data['title']);
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated');
    }

    public function destroy(Article $article)
    {
        abort_if(auth()->user()->role !== 'admin' && auth()->user()->id !== $article->user_id, 403);
        $this->authorize('delete', $article);
        if ($article->cover_image) {
            Storage::disk('public')->delete($article->cover_image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted');
    }
}
