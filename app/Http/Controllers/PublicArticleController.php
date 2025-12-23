<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::published();

        if ($search = $request->get('q')) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $articles = $query->paginate(6)->withQueryString();

        $featured = Article::published()->latest()->first();

        return view('welcome', compact('articles', 'featured'));
    }

    public function show(Article $article)
    {
        // If article is not published and not admin/owner, abort
        if ($article->status !== 'published') {
            abort(404);
        }

        $likeCount = $article->likes()->count();

        return view('articles.show', compact('article', 'likeCount'));
    }
}
