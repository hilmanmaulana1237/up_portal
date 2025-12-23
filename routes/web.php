<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

Route::get('/', [PublicArticleController::class, 'index'])->name('home');

Route::get('articles/{article:slug}', [PublicArticleController::class, 'show'])->name('articles.show');
Route::post('articles/{article:slug}/comments', [CommentController::class, 'store'])->name('articles.comments.store')->middleware('auth');
Route::post('articles/{article:slug}/like', [LikeController::class, 'store'])->name('articles.like');

// User Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Chat API (public for landing page chatbot)
Route::post('chat', [\App\Http\Controllers\ChatController::class, 'chat'])
    ->name('chat');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

// Admin section
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('dashboard');

    Route::resource('articles', AdminArticleController::class);

    // Comments management
    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
