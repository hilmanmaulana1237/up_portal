<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Article;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');
        
        // Get some context from blog articles
        $articles = Article::where('status', 'published')
            ->latest('published_at')
            ->take(5)
            ->get(['title', 'excerpt'])
            ->map(fn($a) => "- {$a->title}: {$a->excerpt}")
            ->join("\n");

        $systemPrompt = "Kamu adalah asisten virtual untuk blog 'Blog Mini'. Kamu membantu pengunjung dengan pertanyaan seputar artikel dan penggunaan blog. Berikut adalah beberapa artikel terbaru di blog ini:\n\n{$articles}\n\nJawab dalam Bahasa Indonesia dengan ramah dan informatif. Jika pertanyaan di luar topik blog, arahkan pengguna ke konten yang relevan.";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('openrouter.api_key'),
                'Content-Type' => 'application/json',
                'HTTP-Referer' => url('/'),
                'X-Title' => 'Blog Mini Chat',
            ])->timeout(30)->post(config('openrouter.base_url') . '/chat/completions', [
                'model' => config('openrouter.model'),
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userMessage],
                ],
                'max_tokens' => 500,
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['choices'][0]['message']['content'] ?? 'Maaf, saya tidak bisa menjawab saat ini.';
                
                // Clean up thinking tags if present
                $reply = preg_replace('/<think>.*?<\/think>/s', '', $reply);
                $reply = trim($reply);
                
                return response()->json(['reply' => $reply]);
            }

            return response()->json(['reply' => 'Maaf, terjadi kesalahan. Silakan coba lagi.'], 500);
        } catch (\Exception $e) {
            return response()->json(['reply' => 'Maaf, layanan sedang tidak tersedia. Silakan coba lagi nanti.'], 500);
        }
    }
}
