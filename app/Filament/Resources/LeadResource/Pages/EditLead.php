<?php

namespace App\Filament\Resources\LeadResource\Pages;

use App\Filament\Resources\LeadResource;
use App\Mail\MasterResponseMail; // <-- Import the Mailable class
use App\Models\Lead;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditLead extends EditRecord
{
    protected static string $resource = LeadResource::class;

    /**
     * Pre-fill the master_response field with the ai_response content
     * if master_response is empty.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (empty($data['master_response']) && !empty($data['ai_response'])) {
            $data['master_response'] = $data['ai_response'];
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('approveAndSend')
                ->label('Approve and Send to Client')
                ->color('success')
                ->icon('heroicon-o-paper-airplane')
                ->requiresConfirmation()
                ->modalHeading('Send Response to Client')
                ->modalDescription('This will send the master response to the client\'s email and update the lead status. Are you sure?')
                ->action(function (Lead $record, array $data) {
                    // 1. Save the form data (including the potentially edited master_response)
                    $record->update($data);

                    // 2. Send the email
                    Mail::to($record->client_email)->send(new MasterResponseMail($record));

                    // 3. Update the status
                    $record->update(['status' => 'responded']);

                    // 4. Show success notification
                    Notification::make()
                        ->title('Response Sent Successfully')
                        ->success()
                        ->send();
                }),

            Actions\DeleteAction::make(),
        ];
    }
}
