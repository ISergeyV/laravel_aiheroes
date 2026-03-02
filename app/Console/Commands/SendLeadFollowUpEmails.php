<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Lead;
use App\Mail\PartialLeadFollowUp;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendLeadFollowUpEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leads:followup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends follow-up emails to partial leads after 1 hour of inactivity.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oneHourAgo = Carbon::now()->subHour();

        // Get partial leads older than 1 hour
        $leads = Lead::where('status', 'partial')
            ->where('created_at', '<=', $oneHourAgo)
            ->get();

        $count = 0;
        foreach ($leads as $lead) {
            if ($lead->client_email) {
                Mail::to($lead->client_email)->send(new PartialLeadFollowUp($lead));
                
                // Update status to prevent sending again
                $lead->update(['status' => 'followup_sent']);
                $count++;
            }
        }

        $this->info("Sent {$count} follow-up emails.");
    }
}
