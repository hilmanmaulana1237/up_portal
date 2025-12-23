@extends('layouts.guest')

@section('content')
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z\" fill=\"rgba(255,255,255,0.07)\"%3E%3C/path%3E%3C/svg%3E')] opacity-40"></div>
        <div class="relative container mx-auto px-6 py-20 lg:py-28 pb-32 lg:pb-40">
            <div class="max-w-3xl mx-auto text-center">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    Platform Blogging Terbaik
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Tulis, Bagikan & <span class="text-yellow-300">Inspirasi</span> Dunia
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                    Temukan artikel menarik, bagikan pemikiran Anda, dan bergabung dengan komunitas penulis kreatif di Portal Blogging.
                </p>

                {{-- Search box --}}
                <form method="GET" action="{{ route('home') }}" class="max-w-xl mx-auto">
                    <div class="relative flex items-center">
                        <div class="absolute left-4 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input name="q" value="{{ request('q') }}" placeholder="Cari artikel, topik, atau penulis..." class="w-full pl-12 pr-32 py-4 rounded-full bg-white/95 backdrop-blur-sm border-0 text-gray-800 placeholder-gray-500 shadow-xl focus:ring-4 focus:ring-white/30 focus:outline-none transition-all" />
                        <button class="absolute right-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg">
                            Cari
                        </button>
                    </div>
                </form>

                {{-- Stats --}}
                <div class="flex flex-wrap justify-center gap-4 sm:gap-6 mt-12">
                    <div class="flex items-center gap-3 px-6 py-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/20">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-white">{{ \App\Models\Article::where('status', 'published')->count() }}+</div>
                            <div class="text-white/70 text-sm">Artikel</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 px-6 py-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/20">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-white">{{ \App\Models\User::count() }}+</div>
                            <div class="text-white/70 text-sm">Penulis</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 px-6 py-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/20">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-white">{{ \App\Models\Comment::count() }}+</div>
                            <div class="text-white/70 text-sm">Komentar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Wave decoration --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" class="fill-white dark:fill-zinc-900"/>
            </svg>
        </div>
    </section>

    {{-- Main Content --}}
    <div class="container mx-auto px-6 py-12">
        <div class="grid lg:grid-cols-3 gap-10 items-start">
            <section class="lg:col-span-2">
                {{-- Featured article --}}
                @if(isset($featured) && $featured)
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="w-8 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full"></span>
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Artikel Unggulan</h2>
                        </div>
                        <article class="group relative rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-xl hover:shadow-2xl transition-all duration-300">
                            <div class="md:flex">
                                @if($featured->cover_image)
                                    <div class="md:w-1/2 relative overflow-hidden">
                                        <img src="{{ (\Illuminate\Support\Str::startsWith($featured->cover_image, 'http') ? $featured->cover_image : asset('storage/' . $featured->cover_image)) }}" alt="cover" class="w-full h-64 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent md:bg-gradient-to-r"></div>
                                    </div>
                                @endif
                                <div class="md:w-1/2 p-6 md:p-8 flex flex-col justify-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-700 dark:from-indigo-900/50 dark:to-purple-900/50 dark:text-indigo-300 w-fit mb-4">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        Unggulan
                                    </span>
                                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                        {{ $featured->title }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-zinc-400 mb-4 line-clamp-3">{{ $featured->excerpt }}</p>
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr(optional($featured->user)->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900 dark:text-white text-sm">{{ optional($featured->user)->name ?? 'Unknown' }}</div>
                                            <div class="text-xs text-gray-500 dark:text-zinc-500">{{ $featured->published_at ? $featured->published_at->format('d M Y') : '' }}</div>
                                        </div>
                                    </div>
                                    <a href="{{ route('articles.show', $featured) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all w-fit group/btn">
                                        Baca Artikel
                                        <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endif

                {{-- Latest articles grid --}}
                <section>
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full"></span>
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Artikel Terbaru</h2>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-6">
                        @forelse($articles as $article)
                            <article class="group rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                <div class="relative overflow-hidden">
                                    @if($article->cover_image)
                                        <img src="{{ (\Illuminate\Support\Str::startsWith($article->cover_image, 'http') ? $article->cover_image : asset('storage/' . $article->cover_image)) }}" alt="cover" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-indigo-300 dark:text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                        </div>
                                    @endif
                                    <div class="absolute top-3 right-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-white/90 dark:bg-zinc-800/90 text-gray-700 dark:text-zinc-300 backdrop-blur-sm">
                                            {{ $article->published_at ? $article->published_at->diffForHumans() : 'Draft' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors line-clamp-2">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-zinc-400 text-sm mb-4 line-clamp-2">{{ $article->excerpt }}</p>
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-zinc-700">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white text-xs font-bold">
                                                {{ strtoupper(substr(optional($article->user)->name ?? 'U', 0, 1)) }}
                                            </div>
                                            <span class="text-sm text-gray-600 dark:text-zinc-400">{{ optional($article->user)->name ?? 'Unknown' }}</span>
                                        </div>
                                        <a href="{{ route('articles.show', $article) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="col-span-2 text-center py-16">
                                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Belum Ada Artikel</h3>
                                <p class="text-gray-500 dark:text-zinc-400">Jadilah yang pertama menulis artikel!</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-8">{{ $articles->links() }}</div>
                </section>
            </section>

            {{-- Sidebar --}}
            <aside class="space-y-6">
                {{-- CTA Card --}}
                <div class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 p-6 text-white shadow-xl">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                    <div class="relative">
                        <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Mulai Menulis</h3>
                        <p class="text-white/80 text-sm mb-4">Bagikan ide dan cerita Anda dengan ribuan pembaca di Portal Blogging.</p>
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-indigo-600 font-semibold hover:bg-gray-100 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-indigo-600 font-semibold hover:bg-gray-100 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                Daftar Gratis
                            </a>
                        @endauth
                    </div>
                </div>

                {{-- About Card --}}
                <div class="rounded-2xl bg-white dark:bg-zinc-800 p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/50 dark:to-purple-900/50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white">Tentang Kami</h3>
                    </div>
                    <p class="text-gray-600 dark:text-zinc-400 text-sm leading-relaxed">
                        Portal Blogging adalah platform berbagi tulisan yang dibangun dengan Laravel. Tulis artikel, tinggalkan komentar, dan berinteraksi dengan komunitas penulis lainnya.
                    </p>
                </div>

                {{-- Features Card --}}
                <div class="rounded-2xl bg-white dark:bg-zinc-800 p-6 shadow-lg">
                    <h3 class="font-bold text-gray-900 dark:text-white mb-4">Fitur Unggulan</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-sm text-gray-600 dark:text-zinc-400">
                            <div class="w-8 h-8 rounded-lg bg-green-100 dark:bg-green-900/30 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            Tulis & publikasi artikel
                        </li>
                        <li class="flex items-center gap-3 text-sm text-gray-600 dark:text-zinc-400">
                            <div class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                            </div>
                            Komentar & diskusi
                        </li>
                        <li class="flex items-center gap-3 text-sm text-gray-600 dark:text-zinc-400">
                            <div class="w-8 h-8 rounded-lg bg-pink-100 dark:bg-pink-900/30 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-pink-600 dark:text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                            </div>
                            Like artikel favorit
                        </li>
                        <li class="flex items-center gap-3 text-sm text-gray-600 dark:text-zinc-400">
                            <div class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/></svg>
                            </div>
                            Profil penulis
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    {{-- Chatbot Widget --}}
    <x-chatbot />
@endsection
