<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'year',
        'quarter',
        'title',
        'file_path',
        'file_type',
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
