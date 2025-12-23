<x-layouts.app :title="__('Admin Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        {{-- Header --}}
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Admin Dashboard 🛠️
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Kelola blog Anda dengan mudah. Berikut ringkasan statistik dan aktivitas terbaru.
            </p>
        </div>

        {{-- Statistik Utama --}}
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            {{-- Total Artikel --}}
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Artikel</p>
                        <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ $totalArticles }}</p>
                        <div class="mt-2 flex gap-2 text-xs">
                            <span class="text-green-600 dark:text-green-400">{{ $publishedArticles }} Published</span>
                            <span class="text-gray-400">|</span>
                            <span class="text-yellow-600 dark:text-yellow-400">{{ $draftArticles }} Draft</span>
                        </div>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Total Komentar --}}
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Komentar</p>
                        <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ $totalComments }}</p>
                        <div class="mt-2 flex gap-2 text-xs">
                            <span class="text-green-600 dark:text-green-400">{{ $approvedComments }} Approved</span>
                            <span class="text-gray-400">|</span>
                            <span class="text-orange-600 dark:text-orange-400">{{ $pendingComments }} Pending</span>
                        </div>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100 dark:bg-green-900">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Total Likes --}}
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Likes</p>
                        <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ $totalLikes }}</p>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Dari semua artikel</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-red-100 dark:bg-red-900">
                        <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Total Users --}}
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Users</p>
                        <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ $totalUsers }}</p>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Pengguna terdaftar</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tulis Artikel Baru
            </a>
            <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-gray-200 transition hover:bg-gray-50 dark:bg-neutral-800 dark:text-gray-200 dark:ring-neutral-700 dark:hover:bg-neutral-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Kelola Artikel
            </a>
            <a href="{{ route('admin.comments.index') }}" class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-gray-200 transition hover:bg-gray-50 dark:bg-neutral-800 dark:text-gray-200 dark:ring-neutral-700 dark:hover:bg-neutral-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Moderasi Komentar
                @if($pendingComments > 0)
                    <span class="rounded-full bg-orange-500 px-2 py-0.5 text-xs text-white">{{ $pendingComments }}</span>
                @endif
            </a>
        </div>

        {{-- Content Grid --}}
        <div class="grid gap-6 lg:grid-cols-2">
            {{-- Artikel Terbaru --}}
            <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between border-b border-neutral-200 p-4 dark:border-neutral-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Artikel Terbaru</h2>
                    <a href="{{ route('admin.articles.index') }}" class="text-sm text-indigo-600 hover:underline dark:text-indigo-400">Lihat Semua</a>
                </div>
                <div class="divide-y divide-neutral-200 dark:divide-neutral-700">
                    @forelse($recentArticles as $article)
                        <div class="flex items-center gap-4 p-4">
                            @if($article->cover_image)
                                <img src="{{ Str::startsWith($article->cover_image, 'http') ? $article->cover_image : asset('storage/' . $article->cover_image) }}" 
                                     alt="" class="h-12 w-12 rounded-lg object-cover">
                            @else
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 dark:bg-neutral-700">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="font-medium text-gray-900 hover:text-indigo-600 dark:text-white dark:hover:text-indigo-400">
                                    {{ Str::limit($article->title, 40) }}
                                </a>
                                <div class="mt-1 flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                                    <span>{{ $article->user->name ?? 'Unknown' }}</span>
                                    <span>•</span>
                                    <span>{{ $article->created_at->format('d M Y') }}</span>
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ $article->status === 'published' ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300' }}">
                                        {{ ucfirst($article->status) }}
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('admin.articles.edit', $article) }}" class="rounded p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-neutral-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                            <p>Belum ada artikel.</p>
                            <a href="{{ route('admin.articles.create') }}" class="mt-2 inline-block text-indigo-600 hover:underline dark:text-indigo-400">Buat artikel pertama →</a>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Komentar Pending --}}
            <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between border-b border-neutral-200 p-4 dark:border-neutral-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Komentar Pending
                        @if($pendingComments > 0)
                            <span class="ml-2 rounded-full bg-orange-500 px-2 py-0.5 text-xs text-white">{{ $pendingComments }}</span>
                        @endif
                    </h2>
                    <a href="{{ route('admin.comments.index') }}" class="text-sm text-indigo-600 hover:underline dark:text-indigo-400">Lihat Semua</a>
                </div>
                <div class="divide-y divide-neutral-200 dark:divide-neutral-700">
                    @forelse($pendingCommentsList as $comment)
                        <div class="p-4">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-medium text-gray-900 dark:text-white">{{ $comment->name }}</span>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ Str::limit($comment->body, 100) }}</p>
                                    <a href="{{ route('articles.show', $comment->article->slug ?? '#') }}" class="mt-1 inline-block text-xs text-indigo-600 hover:underline dark:text-indigo-400">
                                        {{ Str::limit($comment->article->title ?? 'Artikel Dihapus', 30) }}
                                    </a>
                                </div>
                                <div class="flex gap-1">
                                    <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="rounded p-1.5 text-green-600 hover:bg-green-100 dark:hover:bg-green-900/50" title="Approve">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Hapus komentar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded p-1.5 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50" title="Delete">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                            <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="mt-2">Semua komentar sudah dimoderasi! 🎉</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Artikel Populer --}}
        <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
            <div class="border-b border-neutral-200 p-4 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">🔥 Top 5 Artikel Populer</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-neutral-700/50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">#</th>
                            <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Artikel</th>
                            <th class="px-4 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Likes</th>
                            <th class="px-4 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Komentar</th>
                            <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($topArticles as $index => $article)
                            <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700/50">
                                <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        @if($article->cover_image)
                                            <img src="{{ Str::startsWith($article->cover_image, 'http') ? $article->cover_image : asset('storage/' . $article->cover_image) }}" 
                                                 alt="" class="h-10 w-10 rounded object-cover">
                                        @endif
                                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ Str::limit($article->title, 50) }}</span>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-center">
                                    <span class="inline-flex items-center gap-1 text-sm text-red-600 dark:text-red-400">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                                        </svg>
                                        {{ $article->likes_count }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-center">
                                    <span class="inline-flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                        {{ $article->comments_count }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-right">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">Belum ada data artikel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
