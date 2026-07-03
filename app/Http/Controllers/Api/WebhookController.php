<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AiNews;
use App\Http\Requests\WebhookAiNewsRequest;

class WebhookController extends Controller
{
    /**
     * Handle incoming AI News requests from the Python script.
     */
    public function handleAiNews(WebhookAiNewsRequest $request)
    {
        // For multipart/form-data, the JSON is sent inside the 'payload' field as a string
        $payloadRaw = $request->input('payload');
        
        // Use the request data if no payload string is provided
        $payload = is_string($payloadRaw) ? json_decode($payloadRaw, true) : $request->all();
        
        // If JSON decode fails or payload is empty, default to empty array
        if (!is_array($payload)) {
            $payload = [];
        }

        // Validate the extracted payload manually using the rules from our FormRequest
        // This is needed because the payload might be nested in a JSON string 'payload'
        $validator = \Illuminate\Support\Facades\Validator::make($payload, (new WebhookAiNewsRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        // Default to published unless explicitly specified otherwise
        if (!isset($validated['is_published'])) {
            $validated['is_published'] = true;
        }

        // Handle the image file upload
        if ($request->hasFile('image')) {
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
            'url' => route('ai-news.index') . '#news-' . $aiNews->id,
            'status' => 'success'
        ], 201);
    }
}
