<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'photo_path',
        'title',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
