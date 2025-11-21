<?php

namespace App\Services\AiProviders;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAiProvider implements AiProvider
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
            ->post("https://api.openai.com/v1/chat/completions", [
                'model' => 'gpt-4-turbo', // Or any other model like gpt-3.5-turbo
                'messages' => [
                    ['role' => 'user', 'content' => $prompt]
                ]
            ]);

        if ($response->successful()) {
            return $response->json('choices.0.message.content', 'Sorry, we could not generate a response at the moment.');
        }

        Log::error('OpenAI API request failed', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        throw new \Exception('OpenAI API request failed with status: ' . $response->status());
    }
}
