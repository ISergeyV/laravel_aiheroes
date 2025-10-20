<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    use HasFactory;

    /**
     * Поля, которые можно массово заполнять.
     */
    protected $fillable = [
        'title',
        'url',
        'order',
        'parent_id',
    ];

    /**
     * Определяет отношение "родительского" пункта меню.
     * Каждый пункт меню может принадлежать одному родителю.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Определяет отношение "дочерних" пунктов меню.
     * У каждого пункта меню может быть много дочерних.
     */
    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order');
    }
}
