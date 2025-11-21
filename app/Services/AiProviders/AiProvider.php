<?php

namespace App\Services\AiProviders;

interface AiProvider
{
    /**
     * Generate a response based on the given prompt.
     *
     * @param string $prompt
     * @return string
     */
    public function generateResponse(string $prompt): string;
}
