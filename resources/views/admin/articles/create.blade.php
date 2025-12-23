@extends('layouts.app')

@section('content')
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
        {{-- Header --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.articles.index') }}" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 text-gray-500 transition-colors hover:bg-gray-50 dark:border-neutral-700 dark:text-gray-400 dark:hover:bg-neutral-700">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tulis Artikel Baru</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Buat dan publikasikan artikel baru</p>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-6 lg:grid-cols-3">
            @csrf
            
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Title --}}
                <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Artikel</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul artikel..."
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 transition-colors focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white dark:placeholder-gray-500 dark:focus:border-indigo-400 dark:focus:bg-neutral-700">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Excerpt --}}
                <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Ringkasan</label>
                    <textarea name="excerpt" rows="3" placeholder="Tulis ringkasan singkat artikel..."
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 transition-colors focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white dark:placeholder-gray-500 dark:focus:border-indigo-400 dark:focus:bg-neutral-700">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Body --}}
                <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Konten Artikel</label>
                    <textarea name="body" rows="12" placeholder="Tulis konten artikel Anda di sini..."
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 transition-colors focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white dark:placeholder-gray-500 dark:focus:border-indigo-400 dark:focus:bg-neutral-700">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Publish --}}
                <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Publikasi</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-gray-900 transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white">
                                <option value="draft">📝 Draft</option>
                                <option value="published">✅ Published</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Publikasi</label>
                            <input type="datetime-local" name="published_at"
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-gray-900 transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white">
                        </div>
                    </div>

                    <button type="submit" class="mt-5 w-full rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-5 py-3 font-semibold text-white shadow-lg shadow-indigo-500/30 transition-all hover:from-indigo-700 hover:to-purple-700 hover:shadow-indigo-500/40">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Buat Artikel
                        </span>
                    </button>
                </div>

                {{-- Cover Image --}}
                <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Cover Image</h3>
                    
                    <div class="flex flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 p-6 transition-colors hover:bg-gray-100 dark:border-neutral-600 dark:bg-neutral-700 dark:hover:bg-neutral-600">
                        <svg class="mb-3 h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Klik untuk upload</p>
                        <input type="file" name="cover_image" class="text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-100 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-200 dark:text-gray-400 dark:file:bg-indigo-900/50 dark:file:text-indigo-400">
                    </div>
                    @error('cover_image')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@endsection
