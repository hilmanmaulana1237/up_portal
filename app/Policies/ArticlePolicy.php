<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    public function view(User $user, Article $article)
    {
        return $user->role === 'admin' || $user->id === $article->user_id;
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Article $article)
    {
        return $user->role === 'admin' || $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article)
    {
        return $user->role === 'admin' || $user->id === $article->user_id;
    }
}
