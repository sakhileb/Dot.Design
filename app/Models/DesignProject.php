<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DesignProject extends Model
{
    protected $fillable = ['user_id', 'name', 'type', 'width', 'height', 'unit'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function canvases(): HasMany
    {
        return $this->hasMany(DesignCanvas::class)->orderBy('page_number');
    }
}
