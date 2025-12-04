<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictBudget extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'title',
        'year',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'description',
        'created_by',
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
