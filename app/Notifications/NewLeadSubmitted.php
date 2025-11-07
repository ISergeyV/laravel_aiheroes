<?php

namespace App\Notifications;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLeadSubmitted extends Notification implements ShouldQueue
{
    use Queueable;

    protected $lead;

    /**
     * Create a new notification instance.
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = route('filament.admin.resources.leads.edit', $this->lead);

        return (new MailMessage)
                    ->subject('New Lead Submitted: ' . $this->lead->service_type)
                    ->greeting('Hello!')
                    ->line('A new lead has been submitted through the website.')
                    ->line('**Client:** ' . $this->lead->client_full_name)
                    ->line('**Service Type:** ' . $this->lead->service_type)
                    ->line('**Description:** ' . $this->lead->job_description)
                    ->action('View Lead in CRM', $url)
                    ->salutation('Regards');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
