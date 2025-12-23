<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        {{-- Header --}}
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Selamat datang, {{ auth()->user()->name }}! 👋
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Berikut adalah ringkasan aktivitas Anda di blog kami.
            </p>
        </div>

        {{-- Statistik Cards --}}
        <div class="grid gap-4 md:grid-cols-3">
            {{-- Total Komentar --}}
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Komentar</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $myComments }}</p>
                    </div>
                </div>
            </div>

            {{-- Komentar Disetujui --}}
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100 dark:bg-green-900">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Disetujui</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $myApprovedComments }}</p>
                    </div>
                </div>
            </div>

            {{-- Komentar Pending --}}
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-100 dark:bg-yellow-900">
                        <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Menunggu Moderasi</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $myPendingComments }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content Grid --}}
        <div class="grid gap-6 lg:grid-cols-2">
            {{-- Komentar Terbaru Saya --}}
            <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                <div class="border-b border-neutral-200 p-4 dark:border-neutral-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Komentar Terbaru Saya</h2>
                </div>
                <div class="p-4">
                    @forelse($recentComments as $comment)
                        <div class="mb-3 rounded-lg bg-gray-50 p-3 dark:bg-neutral-700/50 {{ !$loop->last ? 'border-b border-neutral-200 dark:border-neutral-600' : '' }}">
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex-1">
                                    <a href="{{ route('articles.show', $comment->article->slug ?? '#') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                                        {{ Str::limit($comment->article->title ?? 'Artikel Dihapus', 40) }}
                                    </a>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ Str::limit($comment->body, 80) }}</p>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium {{ $comment->approved ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300' }}">
                                    {{ $comment->approved ? 'Disetujui' : 'Pending' }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="py-8 text-center text-gray-500 dark:text-gray-400">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="mt-2">Anda belum memiliki komentar.</p>
                            <a href="{{ route('home') }}" class="mt-2 inline-block text-blue-600 hover:underline dark:text-blue-400">Jelajahi artikel →</a>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Artikel Terbaru --}}
            <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                <div class="border-b border-neutral-200 p-4 dark:border-neutral-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Artikel Terbaru</h2>
                </div>
                <div class="p-4">
                    @forelse($latestArticles as $article)
                        <a href="{{ route('articles.show', $article) }}" class="mb-3 block rounded-lg bg-gray-50 p-3 transition hover:bg-gray-100 dark:bg-neutral-700/50 dark:hover:bg-neutral-700">
                            <div class="flex items-center gap-3">
                                @if($article->cover_image)
                                    <img src="{{ Str::startsWith($article->cover_image, 'http') ? $article->cover_image : asset('storage/' . $article->cover_image) }}" 
                                         alt="" class="h-12 w-12 rounded-lg object-cover">
                                @else
                                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-200 dark:bg-neutral-600">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ Str::limit($article->title, 45) }}</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $article->published_at?->format('d M Y') ?? 'Draft' }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="py-8 text-center text-gray-500 dark:text-gray-400">Belum ada artikel.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Artikel Populer --}}
        <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
            <div class="border-b border-neutral-200 p-4 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">🔥 Artikel Populer</h2>
            </div>
            <div class="p-4">
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                    @forelse($popularArticles as $article)
                        <a href="{{ route('articles.show', $article) }}" class="group block overflow-hidden rounded-lg border border-neutral-200 transition hover:shadow-lg dark:border-neutral-700">
                            @if($article->cover_image)
                                <img src="{{ Str::startsWith($article->cover_image, 'http') ? $article->cover_image : asset('storage/' . $article->cover_image) }}" 
                                     alt="" class="h-32 w-full object-cover transition group-hover:scale-105">
                            @else
                                <div class="flex h-32 w-full items-center justify-center bg-gray-100 dark:bg-neutral-700">
                                    <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-3">
                                <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ Str::limit($article->title, 35) }}</h3>
                                <div class="mt-2 flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
                                    <span class="flex items-center gap-1">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                                        </svg>
                                        {{ $article->likes_count }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="col-span-full py-8 text-center text-gray-500 dark:text-gray-400">Belum ada artikel populer.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="rounded-xl border border-neutral-200 bg-gradient-to-r from-blue-50 to-indigo-50 p-6 dark:border-neutral-700 dark:from-blue-900/20 dark:to-indigo-900/20">
            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Mulai Beraktivitas</h2>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50 dark:bg-neutral-800 dark:text-gray-200 dark:hover:bg-neutral-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                    </svg>
                    Baca Artikel
                </a>
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50 dark:bg-neutral-800 dark:text-gray-200 dark:hover:bg-neutral-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Edit Profil
                </a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Panel Admin
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Chatbot Widget --}}
    <x-chatbot />
</x-layouts.app>
