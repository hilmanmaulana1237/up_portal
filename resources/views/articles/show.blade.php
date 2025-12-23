@extends('layouts.guest')

@section('content')
<div class="container mx-auto py-6">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">{{ $article->title }}</h1>
        @if($article->cover_image)
            <img src="{{ (\Illuminate\Support\Str::startsWith($article->cover_image, 'http') ? $article->cover_image : asset('storage/' . $article->cover_image)) }}" alt="cover" class="mb-4" loading="lazy">
        @endif
        <div class="prose dark:prose-invert mb-4">{!! nl2br(e($article->body)) !!}</div>

        <div class="mb-6">
            <form action="{{ route('articles.like', $article) }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Suka ({{ $likeCount }})</button>
            </form>
        </div>

        <section class="mb-6">
            <h2 class="text-lg font-semibold">Komentar</h2>
            @forelse($article->comments as $comment)
                <div class="border rounded p-3 mb-2">
                    <div class="font-medium">{{ $comment->name }} <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span></div>
                    <div class="text-sm">{{ $comment->body }}</div>
                </div>
            @empty
                <p class="text-sm text-gray-500">Belum ada komentar.</p>
            @endforelse
        </section>

        <section>
            <h3 class="text-lg font-semibold mb-2">Tinggalkan komentar</h3>
            
            @auth
                {{-- User sudah login, tampilkan form komentar --}}
                <div class="mb-3 p-3 bg-gray-50 dark:bg-gray-800 rounded">
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Berkomentar sebagai <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})
                    </p>
                </div>
                
                @if(session('success'))
                    <div class="mb-3 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="mb-3 p-3 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('articles.comments.store', $article) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="block text-sm font-medium mb-1">Komentar</label>
                        <textarea name="body" class="border rounded w-full px-3 py-2 dark:bg-gray-800 dark:border-gray-600" rows="4" placeholder="Tulis komentar Anda...">{{ old('body') }}</textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-black dark:bg-white dark:text-black text-white rounded hover:opacity-80">Kirim Komentar</button>
                </form>
            @else
                {{-- User belum login, tampilkan pesan --}}
                <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded">
                    <p class="text-yellow-800 dark:text-yellow-200 mb-3">
                        <strong>Anda harus login untuk berkomentar.</strong>
                    </p>
                    <div class="flex gap-2">
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-black dark:bg-white dark:text-black text-white rounded hover:opacity-80">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded hover:bg-gray-100 dark:hover:bg-gray-800">
                            Daftar Akun
                        </a>
                    </div>
                </div>
            @endauth
        </section>
    </div>
</div>
@endsection
