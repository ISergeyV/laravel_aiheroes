<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Http\Requests\CompleteLeadRequest;
use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use App\Jobs\GenerateAiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeadController extends Controller
{
    // Метод для отображения формы
    public function show()
    {
        return view('estimate');
    }

    // Метод для обработки отправки формы
    public function submit(StoreLeadRequest $request)
    {
        // 1. Валидация данных
        $validatedData = $request->validated();

        // 2. БЕЗОПАСНАЯ Обработка загруженных файлов
        $filePaths = [];
        if ($request->hasFile('fileUpload')) {
            foreach ($request->file('fileUpload') as $file) {
                // Сохраняем файл в приватное хранилище `storage/app/leads_attachments`
                // Никто не получит к нему доступ по прямой ссылке.
                $path = $file->store('leads_attachments');
                $filePaths[] = $path;
            }
        }

        // 3. Сохранение данных в базу, сопоставляя поля формы с колонками таблицы
        Lead::create([
            'client_full_name' => $validatedData['fullName'] ?? null,
            'client_phone' => $validatedData['phone'],
            'client_email' => $validatedData['email'] ?? null,
            'service_type' => $validatedData['serviceType'] ?? null,
            'urgency_level' => $validatedData['urgency'] ?? null,
            'job_description' => $validatedData['jobDescription'] ?? null,
            'estimated_budget' => $validatedData['budget'] ?? null,
            'company_website' => $validatedData['companyWebsite'] ?? null,
            'uploaded_files_urls' => $filePaths,
            'status' => 'new', // Статус по умолчанию
        ]);

        // Вместо JSON, делаем редирект на страницу "Спасибо"
        return redirect()->route('lead.thankyou');
    }

    // --- API Methods for Multi-step Wizard ---

    /**
     * Step 1: Capture Email and Start Session
     */
    public function startEstimate(StartLeadRequest $request)
    {
        $token = Str::random(60);

        $lead = Lead::create([
            'client_email' => $request->email,
            'session_token' => $token,
            'status' => 'partial',
        ]);

        return response()->json([
            'success' => true,
            'session_token' => $token,
            'lead_id' => $lead->id
        ]);
    }

    /**
     * Intermediate Steps: Update partial lead data
     */
    public function updateEstimate(UpdateLeadRequest $request)
    {
        $lead = Lead::where('session_token', $request->session_token)
                    ->where('status', 'partial')
                    ->firstOrFail();

        $lead->update([
            'service_type' => $request->serviceType ?? $lead->service_type,
            'job_description' => $request->jobDescription ?? $lead->job_description,
            'estimated_budget' => $request->budget ?? $lead->estimated_budget,
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Final Step: Complete the lead and trigger AI
     */
    public function completeEstimate(CompleteLeadRequest $request)
    {
        $lead = Lead::where('session_token', $request->session_token)
                    ->where('status', 'partial')
                    ->firstOrFail();

        // Process files if any
        $filePaths = $lead->uploaded_files_urls ?? [];
        if ($request->hasFile('fileUpload')) {
            foreach ($request->file('fileUpload') as $file) {
                $path = $file->store('leads_attachments');
                $filePaths[] = $path;
            }
        }

        $lead->update([
            'client_full_name' => $request->fullName,
            'company_website' => $request->companyWebsite,
            'client_phone' => $request->phone,
            'uploaded_files_urls' => $filePaths,
            'status' => 'new',
        ]);

        // Trigger AI Job
        GenerateAiResponse::dispatch($lead);

        return response()->json(['success' => true, 'redirect' => route('lead.thankyou')]);
    }
}
