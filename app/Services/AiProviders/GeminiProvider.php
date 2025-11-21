<?php

namespace App\Services\AiProviders;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiProvider implements AiProvider
{
    protected string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function generateResponse(string $prompt): string
    {
        $response = Http::withOptions(['timeout' => 60])
            ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$this->apiKey}", [
                'contents' => [['parts' => [['text' => $prompt]]]]
            ]);

        if ($response->successful()) {
            return $response->json('candidates.0.content.parts.0.text', 'Sorry, we could not generate a response at the moment.');
        }

        Log::error('Gemini API request failed', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        throw new \Exception('Gemini API request failed with status: ' . $response->status());
    }
}
