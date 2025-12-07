<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictAgenda extends Model
{
    protected $fillable = [
        'district_id',
        'title',
        'description',
        'event_date',
        'time_start',
        'time_end',
        'location',
        'category',
        'participants',
        'created_by'
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
