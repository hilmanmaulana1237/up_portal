<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $visitorToken = $request->session()->get('visitor_token');
        if (! $visitorToken) {
            $visitorToken = bin2hex(random_bytes(16));
            $request->session()->put('visitor_token', $visitorToken);
        }

        $exists = Like::where('article_id', $article->id)->where('visitor_token', $visitorToken)->exists();
        if ($exists) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Already liked'], 422);
            }
            return back()->with('error', 'Already liked');
        }

        Like::create([
            'article_id' => $article->id,
            'visitor_token' => $visitorToken,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Liked'], 201);
        }

        return back()->with('success', 'Liked');
    }
}
