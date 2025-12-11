<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'village_id',
        'title',
        'content',
        'status',
        'created_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
