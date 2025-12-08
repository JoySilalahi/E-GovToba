<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    protected $fillable = [
        'village_id',
        'title',
        'content',
        'date',
        'type',
        'status',
        'category',
        'effective_date',
        'end_date',
        'location',
        'contact',
    ];

    protected $casts = [
        'date' => 'date',
        'effective_date' => 'date',
        'end_date' => 'date',
    ];

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
}
