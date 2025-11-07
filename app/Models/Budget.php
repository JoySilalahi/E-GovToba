<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'village_id',
        'file_name',
        'file_path',
        'year',
        'quarter',
    ];

    protected $casts = [
        'year' => 'integer',
        'quarter' => 'integer',
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
