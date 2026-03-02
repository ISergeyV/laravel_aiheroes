<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiNews extends Model
{
    protected $fillable = [
        'title',
        'is_published',
        'original_text',
        'image_path',
        'insight',
        'video_url',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'insight' => 'array',
        'published_at' => 'datetime',
    ];
}
