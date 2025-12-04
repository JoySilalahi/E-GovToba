<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictNews extends Model
{
    protected $fillable = [
        'district_id',
        'category',
        'title',
        'excerpt',
        'content',
        'published_at',
        'published_by'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'published_by');
    }
}
