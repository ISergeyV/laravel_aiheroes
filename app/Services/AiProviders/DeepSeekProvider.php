<?php

namespace App\Services\AiProviders;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeepSeekProvider implements AiProvider
{
    protected string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function generateResponse(string $prompt): string
    {
        $response = Http::withToken($this->apiKey)
            ->withOptions(['timeout' => 60])
            ->post("https://api.deepseek.com/v1/chat/completions", [
                'model' => 'deepseek-chat',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt]
                ]
            ]);

        if ($response->successful()) {
            return $response->json('choices.0.message.content', 'Sorry, we could not generate a response at the moment.');
        }

        Log::error('DeepSeek API request failed', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        throw new \Exception('DeepSeek API request failed with status: ' . $response->status());
    }
}
