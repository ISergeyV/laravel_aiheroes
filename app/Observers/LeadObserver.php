<?php

namespace App\Observers;

use App\Models\Lead;
use App\Jobs\GenerateAiResponse;
use App\Notifications\NewLeadSubmitted;
use App\Settings\SiteSettings;
use Illuminate\Support\Facades\Notification;

class LeadObserver
{
    /**
     * Handle the Lead "created" event.
     */
    public function created(Lead $lead): void
    {
        // Dispatch AI response generation job
        GenerateAiResponse::dispatch($lead);

        // Send notification to the admin
        $siteSettings = app(SiteSettings::class);
        if (!empty($siteSettings->notification_recipient_email)) {
            Notification::route('mail', $siteSettings->notification_recipient_email)
                ->notify(new NewLeadSubmitted($lead));
        }
    }

    /**
     * Handle the Lead "updated" event.
     */
    public function updated(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "deleted" event.
     */
    public function deleted(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "restored" event.
     */
    public function restored(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "force deleted" event.
     */
    public function forceDeleted(Lead $lead): void
    {
        //
    }
}
