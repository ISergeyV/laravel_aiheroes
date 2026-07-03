<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebhookAiNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization is handled by the webhook.auth middleware
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'original_text' => 'nullable|string',
            'insight' => 'nullable|array',
            'insight.summary' => 'nullable|string',
            'insight.key_thoughts' => 'nullable|array',
            'insight.key_thoughts.*' => 'string',
            'insight.why_it_matters' => 'nullable|string',
            'insight.category' => 'nullable|string',
            'insight.importance_score' => 'nullable|integer|between:7,10',
            'video_url' => 'nullable|url',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ];
    }
}
