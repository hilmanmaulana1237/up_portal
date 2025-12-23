<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;

Route::get('articles', function () {
    return Article::published()->get();
});
