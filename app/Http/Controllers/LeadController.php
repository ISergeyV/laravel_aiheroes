<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLeadNotification;


// Импортируем нашу модель
use Illuminate\Http\Request;

class LeadController extends Controller
{
    // Метод для отображения формы
    public function show()
    {
        return view('estimate');
    }

    // Метод для обработки отправки формы
    public function submit(Request $request)
    {
        // 1. Валидация данных
        $validatedData = $request->validate([
            'fullName' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'serviceType' => 'nullable|string',
            'urgency' => 'nullable|string',
            'jobDescription' => 'nullable|string',
            'budget' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'disclaimer' => 'required|accepted',
            'fileUpload' => 'nullable|array',
            'fileUpload.*' => 'file|mimes:jpg,jpeg,png,mp4,mov,avi|max:250600', // 250MB
        ]);

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
        $lead = Lead::create([
            'client_full_name' => $validatedData['fullName'] ?? null,
            'client_phone' => $validatedData['phone'],
            'client_email' => $validatedData['email'] ?? null,
            'service_type' => $validatedData['serviceType'] ?? null,
            'urgency_level' => $validatedData['urgency'] ?? null,
            'job_description' => $validatedData['jobDescription'] ?? null,
            'estimated_budget' => $validatedData['budget'] ?? null,
            'service_address' => $validatedData['address'] ?? null,
            'uploaded_files_urls' => $filePaths,
            'status' => 'new', // Статус по умолчанию
        ]);

        //OLD:
        // 4. Возвращаем успешный ответ для JavaScript
        //return response()->json(['message' => 'Estimate request submitted successfully!']);

        // Отправляем email-уведомление
        Mail::to(config('mail.to_admin_address'))->send(new NewLeadNotification($lead));

        // Вместо JSON, делаем редирект на страницу "Спасибо"
        return redirect()->route('lead.thankyou');
    }

    /**
     * Показывает страницу со списком всех заявок (для админ-панели).
     */
    public function index()
    {
        // 1. Получаем ВСЕ заявки из базы данных, сортируя по новым.
        $leads = Lead::latest()->get();

        // 2. Возвращаем представление и передаем в него все найденные заявки
        //    в переменной с именем 'leads'.
        return view('admin.leads.index', ['leads' => $leads]);
    }

    /**
     * Показывает страницу с деталями одной конкретной заявки.
     */
    public function showDetails(Lead $lead)
    {
        // Laravel автоматически найдет заявку по ID из URL (например, /admin/leads/5)
        // и передаст ее в виде объекта $lead. Это называется "Route Model Binding".

        // 2. Возвращаем представление и передаем в него ОДНУ найденную заявку.
        return view('admin.leads.show', ['lead' => $lead]);
    }
}
