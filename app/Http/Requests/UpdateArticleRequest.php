<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && $this->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'excerpt' => 'nullable|string',
            'body' => 'sometimes|required|string',
            'cover_image' => 'nullable|image|max:4096',
            'status' => 'sometimes|required|in:draft,published',
            'published_at' => 'nullable|date',
        ];
    }
}
