<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Dashboard untuk user biasa
     */
    public function index()
    {
        $user = auth()->user();
        
        // Statistik user
        $myComments = Comment::where('email', $user->email)->count();
        $myApprovedComments = Comment::where('email', $user->email)->where('approved', true)->count();
        $myPendingComments = Comment::where('email', $user->email)->where('approved', false)->count();
        
        // Komentar terbaru user
        $recentComments = Comment::where('email', $user->email)
            ->with('article')
            ->latest()
            ->take(5)
            ->get();
        
        // Artikel terbaru
        $latestArticles = Article::where('status', 'published')
            ->latest('published_at')
            ->take(5)
            ->get();
        
        // Artikel populer (berdasarkan jumlah like)
        $popularArticles = Article::where('status', 'published')
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->take(5)
            ->get();
        
        return view('dashboard', compact(
            'myComments',
            'myApprovedComments', 
            'myPendingComments',
            'recentComments',
            'latestArticles',
            'popularArticles'
        ));
    }
    
    /**
     * Dashboard untuk admin
     */
    public function admin()
    {
        $user = auth()->user();
        
        // Pastikan admin
        abort_if($user->role !== 'admin', 403);
        
        // Statistik utama
        $totalArticles = Article::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $draftArticles = Article::where('status', 'draft')->count();
        $totalComments = Comment::count();
        $pendingComments = Comment::where('approved', false)->count();
        $approvedComments = Comment::where('approved', true)->count();
        $totalLikes = Like::count();
        $totalUsers = User::count();
        
        // Artikel terbaru
        $recentArticles = Article::with('user')
            ->latest()
            ->take(5)
            ->get();
        
        // Komentar pending terbaru
        $pendingCommentsList = Comment::where('approved', false)
            ->with('article')
            ->latest()
            ->take(5)
            ->get();
        
        // Artikel paling populer
        $topArticles = Article::where('status', 'published')
            ->withCount(['likes', 'comments'])
            ->orderByDesc('likes_count')
            ->take(5)
            ->get();
        
        // Statistik mingguan (artikel per hari dalam 7 hari terakhir)
        $weeklyStats = Article::where('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        return view('admin.dashboard', compact(
            'totalArticles',
            'publishedArticles',
            'draftArticles',
            'totalComments',
            'pendingComments',
            'approvedComments',
            'totalLikes',
            'totalUsers',
            'recentArticles',
            'pendingCommentsList',
            'topArticles',
            'weeklyStats'
        ));
    }
}
