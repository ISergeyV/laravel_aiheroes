<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LeadController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Multi-step form API endpoints
Route::post('/leads/start', [LeadController::class, 'startEstimate'])->name('api.lead.start');
Route::post('/leads/update', [LeadController::class, 'updateEstimate'])->name('api.lead.update');
Route::post('/leads/complete', [LeadController::class, 'completeEstimate'])->name('api.lead.complete');

// Webhooks
Route::post('/webhooks/ai-news', [\App\Http\Controllers\Api\WebhookController::class, 'handleAiNews'])
    ->middleware('webhook.auth')
    ->name('api.webhook.ainews');
