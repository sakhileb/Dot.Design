<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesignCanvas extends Model
{
    protected $fillable = ['design_project_id', 'page_number', 'elements', 'background_color', 'background_image'];

    protected $casts = ['elements' => 'array'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(DesignProject::class, 'design_project_id');
    }
}
