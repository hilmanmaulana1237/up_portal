<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Article $article)
    {
        $user = auth()->user();
        
        Comment::create([
            'article_id' => $article->id,
            'name' => $user->name,
            'email' => $user->email,
            'body' => $request->validated('body'),
            'parent_id' => $request->validated('parent_id'),
            'approved' => false,
        ]);
        
        return back()->with('success', 'Komentar Anda telah dikirim dan menunggu moderasi.');
    }

    public function index()
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);
        $comments = Comment::latest()->paginate(20);
        return view('admin.comments.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);
        $comment->update(['approved' => true]);
        return back()->with('success', 'Comment approved');
    }

    public function destroy(Comment $comment)
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);
        $comment->delete();
        return back()->with('success', 'Comment deleted');
    }
}
