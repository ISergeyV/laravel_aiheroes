<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AiNews;

class WebhookController extends Controller
{
    /**
     * Handle incoming AI News requests from the Python script.
     */
    public function handleAiNews(Request $request)
    {
        // For multipart/form-data, the JSON is sent inside the 'payload' field as a string
        $payloadRaw = $request->input('payload');
        $payload = is_string($payloadRaw) ? json_decode($payloadRaw, true) : $request->all();

        // If JSON decode fails or payload is empty, default to empty array for validation
        if (!is_array($payload)) {
            $payload = [];
        }

        // Validate the extracted payload manually using the Validator facade
        $validator = \Illuminate\Support\Facades\Validator::make($payload, [
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
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        // Handle the image file upload
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'image|mimes:jpeg,png,jpg,webp|max:5120']); // 5MB max
            $path = $request->file('image')->store('news-images', 'public');
            $validated['image_path'] = $path;
        }

        if (!empty($validated['video_url'])) {
            $aiNews = AiNews::updateOrCreate(
                ['video_url' => $validated['video_url']],
                $validated
            );
        } else {
            $aiNews = AiNews::create($validated);
        }

        return response()->json([
            'message' => 'AI News received successfully',
            'id' => $aiNews->id,
            'status' => 'success'
        ], 201);
    }
}
