<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebhookToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedToken = config('services.webhook.secret') ?? env('WEBHOOK_SECRET');
        
        if (!$expectedToken) {
            // If no secret is configured, consider the endpoint secured/disabled
            return response()->json(['error' => 'Webhook secret not configured'], 500);
        }

        $providedToken = $request->header('X-Webhook-Token');

        if (!hash_equals($expectedToken, (string) $providedToken)) {
            return response()->json(['error' => 'Unauthorized. Invalid webhook token.'], 401);
        }

        return $next($request);
    }
}
