<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    /**
     * Атрибуты, которые можно массово назначать.
     * Названия должны совпадать с колонками в вашей миграции.
     */
    protected $fillable = [
        'client_full_name',
        'client_phone',
        'client_email',
        'service_type',
        'urgency_level',
        'job_description',
        'estimated_budget',
        'uploaded_files_urls',
        'service_address',
        'status',
        'internal_notes',
    ];

    /**
     * Указываем Laravel, что колонка 'uploaded_files_urls'
     * должна автоматически преобразовываться в массив и обратно.
     */
    protected $casts = [
        'uploaded_files_urls' => 'array',
    ];
}
